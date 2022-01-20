<?php

namespace App\Http\Controllers;

use Auth;
use app\User;
use App\mapel;
use App\student;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\StudentImport;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use PDF;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        if($request->has('cari')){
            $student = \App\student::where('nama_siswa','LIKE','%'.$request->cari.'%')
            ->orWhere('kelas','LIKE','%'.$request->cari.'%')->get();
        }else{

            $student = DB::table('student')->get()->sortBy('kelas');
           
        }
        // $a=0;
        // foreach($student->mapel() as $bps){
        //     if($bps->status == "selesai"){
        //         $a++;
        //     }
        // }
        // if($a==count($bps)){
        //     echo "tuntas";
        // }else{
        //     echo "belum tuntas";
        // }
        return view('admin/student',['student' => $student]);
    }
   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
        return view('admin.createstudent');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //insert tabel user
        $user= new \App\User;
        $user->role = 'siswa';
        $user->name = $request->nama_siswa;
        $user->email = $request->email;
        $user->password= bcrypt('123456789');
        $user->remember_token= Str::random(60);
        $user->save();
        //insert tabel student
        $request->request->add(['user_id'=> $user->id]);
        $student = \App\student::create($request->all());
        return redirect('/admin/student')->with('status','Data Siswa Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(student $student)
    {
        
        $mapels = \App\mapel::all();
        //dd($mapels);
        return view('admin.detailstudent',['student' => $student,'mapels' => $mapels]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(student $student)
    {
        return view('admin.editstudent',compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\student  $student
     * @return \Illuminate\Http\Response
     */
    public function editfp(student $student)
    {
        return view('admin.editfpst',compact('student'));
    }
    public function update(Request $request, student $student)
    {
        $request->validate([
            'nisn' => 'required|size:10',
            'nama_siswa' => 'required',
            
            'alamat' => 'required',
            'jurusan' => 'required',
            'kelas' => 'required'
        ]);
        if($request->file('foto_profil')){
            $foto_profil=$request->file('foto_profil')->store('foto_profil','public');
        }
        student::where('id',$student->id)
        ->update([
            'nisn' => $request->nisn,
            'nama_siswa' => $request->nama_siswa,
           
            'alamat' => $request->alamat,
            'jurusan' => $request->jurusan,
            'kelas' => $request->kelas
            
        ]);
        return redirect('/admin/student/'.$student->id.'')->with('status','Data Siswa Berhasil Diubah');
    }
    public function updatefp(Request $request, student $student)
    {
        $request->validate([

            'foto_profil' => 'required'

        ]);
        if($request->file('foto_profil')){
            $foto_profil=$request->file('foto_profil')->store('foto_profil','public');
        }
        student::where('id',$student->id)
        ->update([

            'foto_profil' => $foto_profil

            
        ]);
        return redirect('/admin/student/'.$student->id.'')->with('status','Data Siswa Berhasil Diubah');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(student $student)
    {

        // DB::raw("delete from users where id =(select userstudent_id where id =".$student->id.")");
        student::destroy($student->id);
        // $user = student::findOrfail($student->id);
        // $user-delete;
               
        return redirect('/admin/student')->with('status','Data Siswa Berhasil Dihapus');
    }

    public function indexst()
    {
        $student = DB::table('student');
        return view('user/profile',['student' => $student]);
    }
    public function showst()
    {
        return view('user.detailprofile',['student' => $student]);
    }
    public function addmapel(Request $request,$idstudent)
    {
   
    $stdn= \App\student::find($idstudent);
   $inst=$stdn->mapel()->create([
        'nama_mapel' =>$request->nama_mapel,
        'status' =>$request->status
    ]);
    return redirect('/admin/student/'.$idstudent.'');
    }
    public function destroymp($ids)
    {
        $stdn = \App\student::find($ids);
        $stdn->mapel()->delete();
        return redirect('/admin/student/'.$stdn->id.'');
    }
    public function addcatatan(Request $request,$idstudent)
    {
   
    $stdn= \App\student::find($idstudent);
   $inst=$stdn->catatan()->create([
        'catatan' =>$request->catatan,
        'tanggal' =>$request->tanggal
    ]);
    return redirect('/admin/student/'.$idstudent.'');
    }
    public function destroyct($ids)
    {
        $stdn = \App\student::find($ids);
        $stdn->catatan()->delete();
        return redirect('/admin/student/'.$stdn->id.'');
    }
    public function lembarprint(student $student)
    {
        
        $mapels = \App\mapel::all();
        //dd($mapels);
        return view('print',['student' => $student,'mapels' => $mapels]);
    }
    public function print(student $student)
    {
        $stdn= \App\student::find($student->id);
        $pdf = PDF::loadview('print',['student'=>$student])->setPaper('A4','potrait')->setOptions(['defaultFont'=>'TimesNewRoman']);
        return $pdf->download('laporan-siswa-'.$stdn->nama_siswa.'-pdf');
    }
    public function import(Request $request)
    {
        // $path = $request->file('file')->getRealPath();
        // $path1 = $request->file('file')->store('temp'); 
        // $path=storage_path('app').'/'.$path1;  
        // $data = \Excel::import(new StudentImport,$path);   
        //  $file = $request->file('file');
        //  $namafile = $file->getClientOriginalName();
        //  $file->move('DataFile',$namafile);    
        //  Excel::import(new StudentImport,storage_path($namafile,'s3',\Maatwebsite\Excel\Excel::XLSX));
        Excel::import(new StudentImport, $request->file, 's3', \Maatwebsite\Excel\Excel::XLSX);
        return redirect('/admin/student')->with('status','Data Siswa Berhasil Ditambahkan');
    }
   
}
