<?php

namespace App\Http\Controllers;

use App\student;
use App\mapel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(mapel $mapel)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(mapel $mapel)
    {
        $student = \App\student::all();
        return view('teacher.mapel',['student' => $student,'mapel' => $mapel]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,mapel $mapel)
    {
        mapel::where('id',$mapel->id)
        ->update([
            'nama_mapel' => $request->nama_mapel,
            'status' => $request->status
            
        ]);
        return redirect('/admin/student/')->with('status','Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(mapel $mapel)
    {
   
    }
    public function ttd(mapel $mapel)
    {
        $student = \App\student::all();
        return view('mapel.ttd',['student' => $student,'mapel' => $mapel]);
    }
    public function addttd(Request $request,mapel $mapel)
    {
   
        $request->validate([

            'ttd' => 'required'

        ]);
        if($request->file('ttd')){
            $ttd=$request->file('ttd')->store('ttd','public');
        }
        mapel::where('id',$mapel->id)
        ->update([

            'ttd' => $ttd
        ]);
        return redirect('/admin/student/');
    }
}
