@extends('layout.basiclayout')
@section('content')
<div class="container">
<div class="row">
<div class="col-10">
    <h1 class= "mt-4">Tambah Data Guru</h1>
    <form method="post" action="/admin/kesiswaan">
    @csrf
 
  <div class="form-group">
    <label for="nama">Nama</label>
    <input type="text" id="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Silakan Masukan Nama" name="nama"
    value="{{old('nama')}}">
    @error('nama')
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
