@extends('layout.basiclayout')
@section('tittle','Tambah Data Murid')
@section('content')
<div class="container">
<div class="row">
<div class="col-10">
    <h1 class= "mt-4">Tambah Data Murid</h1>
    <form method="post" action="/admin/student">
    @csrf
  <div class="form-group">
    <label for="nisn">NISN Siswa</label>
    <input type="text" id="nisn" class="form-control @error('nisn') is-invalid @enderror" placeholder="Silakan Masukan NISN" name="nisn" require
    value="{{old('nisn')}}">
    @error('nisn')
    <div class="invalid-feedback">
        {{$message}}
      </div>
    @enderror
  </div>
  <div class="form-group">
    <label for="nama_siswa">Nama Siswa</label>
    <input type="text" id="nama_siswa" class="form-control @error('nama_siswa') is-invalid @enderror" placeholder="Silakan Masukan Nama Siswa" name="nama_siswa"
    value="{{old('nama_siswa')}}">
    @error('nama_siswa')
    <div class="invalid-feedback">
        {{$message}}
      </div>
    @enderror
  </div>
  <div class="form-group">
    <label for="alamat">Alamat</label>
    <input type="text" id="alamat" class="form-control @error('alamat') is-invalid @enderror" placeholder="Silakan Masukan Alamat" name="alamat"
    value="{{old('alamat')}}">
    @error('alamat')
    <div class="invalid-feedback">
        {{$message}}
      </div>
    @enderror
  </div>
  <div class="form-group">
    <label for="jurusan">Jurusan</label>
    <input type="text" id="jurusan" class="form-control @error('jurusan') is-invalid @enderror" placeholder="Silakan Masukan Jurusan" name="jurusan"
    value="{{old('jurusan')}}">
    @error('jurusan')
    <div class="invalid-feedback">
        {{$message}}
      </div>
    @enderror
  </div>
  <div class="form-group">
    <label for="kelas">Kelas</label>
    <input type="text" id="kelas" class="form-control @error('kelas') is-invalid @enderror" placeholder="Silakan Masukan Kelas" name="kelas"
    value="{{old('kelas')}}">
    @error('kelas')
    <div class="invalid-feedback">
        {{$message}}
      </div>
    @enderror
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="text" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Silakan Masukan Email" name="email"
    value="{{old('email')}}">
    @error('email')
    <div class="invalid-feedback">
        {{$message}}
      </div>
    @enderror
  </div>
  <button type="submit" class="btn btn-primary">Submit Data</button>
</form>
 
</div>
</div>
</div>
@endsection
