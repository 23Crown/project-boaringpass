@extends('layout.basiclayout')

@section('content')

<div class="container">
<div class="row">
<div class="col-10">
    <h1 class= "mt-4">Edit Mata Pelajaran</h1>
    <form method="post" action="/teacher/mapel/{{$mapel->id}}"  enctype="multipart/form-data">
    @method('put')
    @csrf
 
  <div class="form-group">
    <label for="nama_mapel">Mata Pelajaran & Nama Guru</label>
    <input type="text" id="nama_mapel" class="form-control @error('nama_mapel') is-invalid @enderror" placeholder="Silakan Masukan NISN" name="nama_mapel" require
    value="{{$mapel->nama_mapel}}">
    @error('nama_mapel')
    <div class="invalid-feedback">
        {{$message}}
      </div>
    @enderror
  </div>
  <div class="form-group">
    <label for="status">Status</label>
    <input type="text" id="status" class="form-control @error('status') is-invalid @enderror" placeholder="Silakan Masukan Nama Anda" name="status"
    value="{{$mapel->status}}">
    @error('status')
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