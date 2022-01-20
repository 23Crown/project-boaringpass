<?php

namespace App\Http\Controllers;

use app\User;
use App\student;
use App\teacher;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('auth.login');
    }

    public function postlogin(Request $request)
    {
        $credentials= $request->only('email','password','role');
        if(Auth::attempt($credentials)){
            return redirect('/');
        }
        return redirect('/auth/login')->with('status','Login Gagal Harap Masukan Data Dengan Benar');
    }
    public function logout(){
        Auth::logout();
        return redirect('/auth/login');
    }
    public function registertc(){
        return view('auth.registerteacher');
    }
    public function storetc(Request $request){
        //insert tabel user
        $user= new \App\User;
        $user->role = 'guru';
        $user->name = $request->nama_guru;
        $user->email = $request->email;
        $user->password= bcrypt('123456789');
        $user->remember_token= Str::random(60);
        $user->save();
        //insert tabel student
        $request->request->add(['user_id'=> $user->id]);
        $teacher = \App\teacher::create($request->all());
        return redirect('/auth/login')->with('sukses','Berhasil');
    }
    public function registerst(){
        return view('auth.registerstudent');
    }
    public function storest(Request $request){
        //inser tabel user
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
        return redirect('/auth/login')->with('sukses','Berhasil');
    }
}
