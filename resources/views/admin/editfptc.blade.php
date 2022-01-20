@extends('layout.basiclayout')

@section('content')
<div class="container">
<div class="row">
<div class="col-10">
    <h1 class= "mt-4">Edit Foto Profil</h1>
    
    <form method="post" action="/admin/teacher/{{$teacher->id}}/editfp" enctype="multipart/form-data">
    @method('put')
    @csrf
    <div class="form-group">
      <label for="foto_profil">Foto Profil</label>
      <input type="file" id="foto_profil" class="form-control  placeholder="Silakan Masukan Foto Anda" name="foto_profil" value="{{$teacher->kode_guru}}">
      @error('foto_profil')
    <div class="invalid-feedback">
        {{$message}}
      </div>
    @enderror
  </div>
  <button type="submit" class="btn btn-primary">Submit Data</button>
  <a href="/admin/teacher/{{$teacher->id}}" class="btn btn-primary">Kembali</a>
</form>
 
</div>
</div>
</div>
@endsection
