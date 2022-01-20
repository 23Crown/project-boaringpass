@extends('layout.basiclayout')
@section('tittle','Edit Data Murid')
@section('content')
<div class="container">
<div class="row">
<div class="col-10">
    <h1 class= "mt-4">Edit Data Guru</h1>
    
    <form method="post" action="/admin/teacher/{{$teacher->id}}" enctype="multipart/form-data">
    @method('put')
    @csrf
  <div class="form-group">
    <label for="nip">NIP Guru</label>
    <input type="text" id="nip" class="form-control @error('nip') is-invalid @enderror" placeholder="Silakan Masukan NIP" name="nip" require
    value="{{$teacher->nip}}">
    @error('nip')
    <div class="invalid-feedback">
        {{$message}}
      </div>
    @enderror
  </div>
  <div class="form-group">
    <label for="nama_guru">Nama Guru</label>
    <input type="text" id="nama_guru" class="form-control @error('nama_guru') is-invalid @enderror" placeholder="Silakan Masukan Nama Anda" name="nama_guru"
    value="{{$teacher->nama_guru}}">
    @error('nama_guru')
    <div class="invalid-feedback">
        {{$message}}
      </div>
    @enderror
  </div>
  <div class="form-group">
    <label for="alamat">Alamat</label>
    <input type="text" id="alamat" class="form-control @error('alamat') is-invalid @enderror" placeholder="Silakan Masukan Alamat Anda" name="alamat"
    value="{{$teacher->alamat}}">
    @error('alamat')
    <div class="invalid-feedback">
        {{$message}}
      </div>
    @enderror
  </div>

    <!-- <div class="form-group">
    <label for="email">Email</label>
    <input type="text" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Silakan Masukan Email Anda" name="email"
    value="{{$teacher->email}}">
    @error('email')
    <div class="invalid-feedback">
        {{$message}}
      </div>
    @enderror
  </div> -->

   
  <button type="submit" class="btn btn-primary">Submit Data</button>
  <a href="/admin/teacher/{{$teacher->id}}" class="btn btn-primary">Kembali</a>
</form>
 
</div>
</div>
</div>
@endsection
