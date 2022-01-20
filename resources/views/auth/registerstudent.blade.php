@extends('layout.registerlayout')
@section('registerform')
<form class="user" method="post" action="/auth/storest">
@csrf
                <div class="form-group">
                  <input type="nisn" name="nisn" class="form-control form-control-user" id="nisn" placeholder="Masukan NISN Anda">
                </div>
                <div class="form-group">
                  <input type="nama_siswa" name="nama_siswa" class="form-control form-control-user" id="nama_siswa" placeholder="Masukan Nama Anda">
                </div>
                <div class="form-group">
                  <input type="alamat" name="alamat" class="form-control form-control-user" id="alamat" placeholder="Masukan Alamat Anda">
                </div>
                <div class="form-group">
                  <input type="jurusan" name="jurusan" class="form-control form-control-user" id="jurusan" placeholder="Masukan Jurusan Anda">
                </div>
                <div class="form-group">
                  <input type="kelas" name="kelas" class="form-control form-control-user" id="kelas" placeholder="Masukan Kelas Anda">
                </div>
                <div class="form-group">
                  <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Masukan Email Anda">
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                  Register Account
                </button>
               
              </form>
@endsection