@extends('layout.registerlayout')
@section('registerform')
<form class="user" method="post" action="/auth/storetc">
@csrf
<div class="form-group">
<input type="nip" name="nip" class="form-control form-control-user @error('nip') is-invalid @enderror" id="nip" placeholder="Masukan NIP Anda">

@error('nip')
<div class="invalid-feedback">
{{$message}}
</div>
@enderror
</div>
<div class="form-group">
<input type="nama_guru" name="nama_guru" class="form-control form-control-user @error('nama_guru') is-invalid @enderror" id="nama_guru" placeholder="Masukan Nama Anda">

@error('nama_guru')
<div class="invalid-feedback">
{{$message}}
</div>
@enderror
</div>
<div class="form-group">
<input type="alamat" name="alamat" class="form-control form-control-user @error('alamat') is-invalid @enderror" id="alamat" placeholder="Masukan Alamat Anda">

@error('alamat')
<div class="invalid-feedback">
{{$message}}
</div>
@enderror
</div>
<div class="form-group">
<input type="status" name="status" class="form-control form-control-user @error('status') is-invalid @enderror" id="status" placeholder="Masukan Status Anda">

@error('status')
<div class="invalid-feedback">
{{$message}}
</div>
@enderror
</div>
<div class="form-group">
<input type="email" name="email" class="form-control form-control-user @error('email') is-invalid @enderror" id="exampleInputEmail" placeholder="Masukan Email Anda">

@error('email')
<div class="invalid-feedback">
{{$message}}
</div>
@enderror
</div>
<div class="form-group">
<input type="jabatan" name="jabatan" class="form-control form-control-user @error('jabatan') is-invalid @enderror" id="jabatan" placeholder="Masukan Jabatan Anda">

@error('jabatan')
<div class="invalid-feedback">
{{$message}}
</div>
@enderror
 </div>
<div class="form-group">
<input type="kode_guru" name="kode_guru" class="form-control form-control-user @error('kode_guru') is-invalid @enderror" id="kode_guru" placeholder="Masukan Kode Guru Anda">

@error('kode_guru')
<div class="invalid-feedback">
{{$message}}
</div>
@enderror
</div>

<button type="submit" class="btn btn-primary btn-user btn-block">
Register Account
</button>
               
              </form>
@endsection