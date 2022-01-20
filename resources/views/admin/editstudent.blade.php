@extends('layout.basiclayout')

@section('content')
<div class="container">
<div class="row">
<div class="col-10">
    <h1 class= "mt-4">Edit Data Murid</h1>
    <form method="post" action="/admin/student/{{$student->id}}"  enctype="multipart/form-data">
    @method('put')
    @csrf
 
  <div class="form-group">
    <label for="nisn">NISN Siswa</label>
    <input type="text" id="nisn" class="form-control @error('nisn') is-invalid @enderror" placeholder="Silakan Masukan NISN" name="nisn" require
    value="{{$student->nisn}}">
    @error('nisn')
    <div class="invalid-feedback">
        {{$message}}
      </div>
    @enderror
  </div>
  <div class="form-group">
    <label for="nama_siswa">Nama Siswa</label>
    <input type="text" id="nama_siswa" class="form-control @error('nama_siswa') is-invalid @enderror" placeholder="Silakan Masukan Nama Anda" name="nama_siswa"
    value="{{$student->nama_siswa}}">
    @error('nama_siswa')
    <div class="invalid-feedback">
        {{$message}}
      </div>
    @enderror
  </div>
  <div class="form-group">
    <label for="alamat">Alamat</label>
    <input type="text" id="alamat" class="form-control @error('alamat') is-invalid @enderror" placeholder="Silakan Masukan Alamat Anda" name="alamat"
    value="{{$student->alamat}}">
    @error('alamat')
    <div class="invalid-feedback">
        {{$message}}
      </div>
    @enderror
  </div>
  <div class="form-group">
    <label for="jurusan">Jurusan</label>
    <input type="text" id="jurusan" class="form-control @error('jurusan') is-invalid @enderror" placeholder="Silakan Masukan Jurusan Anda" name="jurusan"
    value="{{$student->jurusan}}">
    @error('jurusan')
    <div class="invalid-feedback">
        {{$message}}
      </div>
    @enderror
  </div>
  <div class="form-group">
    <label for="kelas">Kelas</label>
    <input type="text" id="kelas" class="form-control @error('kelas') is-invalid @enderror" placeholder="Silakan Masukan Kelas Anda" name="kelas"
    value="{{$student->kelas}}">
    @error('kelas')
    <div class="invalid-feedback">
        {{$message}}
      </div>
    @enderror
  </div>

  <button type="submit" class="btn btn-primary">Submit Data</button>
  <a href="/admin/student/{{$student->id}}" class="btn btn-primary">Kembali</a>
</form>
 
</div>
</div>
</div>
@endsection
