@extends('layout.basiclayout')

@section('content')
<div class="container">
<div class="row">
<div class="col-10">
    <h1 class= "mt-4">TAMBAH TANDA TANGAN</h1>
    
    <form method="post" action="/mapel/ttd/{{$mapel->id}}/addttd" enctype="multipart/form-data">
    @method('put')
    @csrf
    <div class="form-group">
      <label for="ttd">TANDA TANGAN</label>
      <input type="file" id="ttd" class="form-control  placeholder="Silakan Masukan Foto Anda" name="ttd" value="{{$mapel->ttd}}">
      @error('ttd')
    <div class="invalid-feedback">
        {{$message}}
      </div>
    @enderror
  </div>
  <button type="submit" class="btn btn-primary">Submit Data</button>
  <a href="/mapel/list" class="btn btn-primary">Kembali</a>
</form>
 
</div>
</div>
</div>
@endsection
