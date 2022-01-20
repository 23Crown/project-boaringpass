@extends('layout.basiclayout')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
<h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
@if (session('status'))
    <div class="alert-success">
    {{session('status')}}
    </div>
    @endif 
@if(Auth()->user()->role == 'admin')
<a href="/admin/createkesiswaan" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
@endif
<i class="fas fa-download fa-sm text-white-50"></i>Tambah Data</a> 
   
     </div>
          <!-- Content Row -->
          <div class="row">
    <div class="col-xl-10 col-lg-7">
      <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Daftar Kesiswaan</h6>
         </div>
<!-- Card Body -->
<div class="card-body">
    <table class="table ">
  <thead>
    <tr>
      <th scope="col">No</th> 
      <th scope="col">NAMA</th>
      <th scope="col">ACTION</th>
    </tr>
  </thead>
  <tbody>
  @foreach($kesiswaan as $data)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$data->nama}}</td>
      <td><a href="/admin/kesiswaan/{{$data->id}}">DETAIL</a></td>
    </tr>
@endforeach
  </tbody>
</table>
</div>
</div>
</div>
@endsection