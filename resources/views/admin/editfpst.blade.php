@extends('layout.basiclayout')

@section('content')
<div class="container">
<div class="row">
<div class="col-10">
    <h1 class= "mt-4">Edit Foto Profil</h1>
    
    <form method="post" action="/admin/student/{{$student->id}}/editfp" enctype="multipart/form-data">
    @method('put')
    @csrf
    <div class="form-group">
      <label for="foto_profil">Foto Profil</label>
      <input type="file" id="foto_profil" class="form-control  name="foto_profil" value="{{$student->foto_profil}}">
      @error('foto_profil')
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
