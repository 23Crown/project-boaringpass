@extends('layout.basiclayout')
@section('content')

          <!-- Content Row -->

          <div class="row">


    <div class="col-xl-10 col-lg-7">
      <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Daftar Akun</h6>
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" method="get" action="/admin/user">
            <div class="input-group">
              <input type="text" name="cari_user" class="form-control bg-light border-0 small" placeholder="Cari User" aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="submit">
                  <i class="fas fa-search fa-sm">Cari User</i>
                </button>
              </div>
            </div>
          </form>
         </div>
<!-- Card Body -->
<div class="card-body">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">ROLE</th>
      <th scope="col">NAMA</th>
      <th scope="col">EMAIL</th>
      <th scope="col">HAPUS DATA</th>
    </tr>
  </thead>
  <tbody>
  @foreach($user as $data)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$data->role}}</td>
      <td>{{$data->name}}</td>
      <td>{{$data->email}}</td>
      <td>
    <form action="/admin/user/{{$data->id}}" onsubmit="return confirm('Tekan OK Untuk Menghapus Data')"
     method="post" class="d-inline">
     @method('delete')
    @csrf
    <button type="submit" class="btn btn-danger">DELETE</button></td>
    </tr>
    </form>
@endforeach
  </tbody>
</table>
</div>
</div>
</div>
@endsection