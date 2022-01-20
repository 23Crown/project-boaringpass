<?php

namespace App\Http\Controllers;


use Auth;
use App\kesiswaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class KesiswaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kesiswaan = DB::table('kesiswaan')->get()->sortBy('nama');
        return view('admin/kesiswaan',['kesiswaan' => $kesiswaan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.createkesiswaan');
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
          $user->role = 'kesiswaan';
          $user->name = $request->nama;
          $user->email = $request->email;
          $user->password= bcrypt('123456789');
          $user->remember_token= Str::random(60);
          $user->save();
          //insert tabel kesiswaan
          $request->request->add(['user_id'=> $user->id]);
          $kesiswaan = \App\kesiswaan::create($request->all());
          return redirect('/admin/kesiswaan')->with('status','Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\kesiswaan  $kesiswaan
     * @return \Illuminate\Http\Response
     */
    public function show(kesiswaan $kesiswaan)
    {
        return view('admin.detailkesiswaan',['kesiswaan' => $kesiswaan]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\kesiswaan  $kesiswaan
     * @return \Illuminate\Http\Response
     */
    public function edit(kesiswaan $kesiswaan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\kesiswaan  $kesiswaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, kesiswaan $kesiswaan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\kesiswaan  $kesiswaan
     * @return \Illuminate\Http\Response
     */
    public function destroy(kesiswaan $kesiswaan)
    {
        kesiswaan::destroy($kesiswaan->id);
        return redirect('/admin/kesiswaan')->with('status','Data Berhasil Dihapus');
    }
}
