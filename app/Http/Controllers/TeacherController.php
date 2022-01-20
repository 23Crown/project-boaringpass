<?php

namespace App\Http\Controllers;

use Auth;
use app\User;
use App\teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;
use App\Imports\TeacherImport;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teacher = DB::table('teacher')->get()->sortBy('nip');
        return view('admin/teacher',['teacher' => $teacher]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.createteacher');
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
        $user->role = 'guru';
        $user->name = $request->nama_guru;
        $user->email = $request->email;
        $user->password= bcrypt('123456789');
        $user->remember_token= Str::random(60);
        $user->save();
        //insert tabel guru
        $request->request->add(['user_id'=> $user->id]);
        $teacher = \App\teacher::create($request->all());
        return redirect('/admin/teacher')->with('status','Data Guru Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(teacher $teacher)
    {
        return view('admin.detailteacher',['teacher' => $teacher]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(teacher $teacher)
    {
        return view('admin.editteacher',compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, teacher $teacher)
    {
        $user= new \App\User;
        $request->validate([
            'nip' => 'required|size:10',
            'nama_guru' => 'required',
            
            'alamat' => 'required'
        ]);

        if($request->file('foto_profil')){
            $foto_profil=$request->file('foto_profil')->store('foto_profil','public');
        }

        teacher::where('id',$teacher->id)
        ->update([
            'nip' => $request->nip,
            'nama_guru' => $request->nama_guru,
            
            'alamat' => $request->alamat
        ]);
        $user = User::find(auth::user()->id);
        $user->name=$request['nama_guru'];
        // $user->email=$request['email'];
        $user->save();
        // $user->role = 'guru';
        // $user->name = $request->nama_guru;
        // $user->email = $request->email;
        // $user->password= bcrypt('123456789');
        // $user->remember_token= Str::random(60);
        // $user->save();
        
        return redirect('/admin/teacher/'.$teacher->id.'')->with('status','Data Guru Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(teacher $teacher)
    {
        teacher::destroy($teacher->id);
        return redirect('/admin/teacher')->with('status','Data Guru Berhasil Dihapus');
    }
    public function editfp(teacher $teacher)
    {
        return view('admin.editfptc',compact('teacher'));
    }
    public function updatefp(Request $request, teacher $teacher)
    {
     
        $request->validate([
            'foto_profil' => 'required'
            
        ]);

        if($request->file('foto_profil')){
            $foto_profil=$request->file('foto_profil')->store('foto_profil','public');
        }

        teacher::where('id',$teacher->id)
        ->update([

            'foto_profil' => $foto_profil

        ]);
        
        
        return redirect('/admin/teacher/'.$teacher->id.'')->with('status','Data Guru Berhasil Diubah');
    }
    public function import(Request $request)
    {
       
        Excel::import(new TeacherImport, $request->file, 's3', \Maatwebsite\Excel\Excel::XLSX);
        return redirect('/admin/teacher');
    }
}
