@extends('layout.basiclayout')
@section('content')


<div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            @if(Auth()->user()->role == 'admin')
            <a href="/admin/createteacher" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i>Tambah Data Guru</a> 
            <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#importguru">
            Import Guru Excel
          </button>
            @endif
    @if (session('status'))
    <div class="alert-success">
    {{session('status')}}
    </div>
    @endif 
     </div>
         
          <!-- Content Row -->

          <div class="row">


<div class="col-xl-10 col-lg-7">
      <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Daftar Guru</h6>
         </div>
<!-- Card Body -->
<div class="card-body">
<table class="table ">
  <thead>
    <tr>
      <th scope="col">No.</th>
      <th scope="col">NIP</th>
      <th scope="col">NAMA</th>

    </tr>
  </thead>
  <tbody>
  @foreach($teacher as $data)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td><a href="/admin/teacher/{{$data->id}}">{{$data->nip}}</td>
      <td>{{$data->nama_guru}}</td>

    </tr>
@endforeach
  </tbody>
</table>
                <!-- </div>
              </div>
            </div>
    <h1 class= "/h1>
    <a href="/admin/createteacher" class="btn btn-primary btn-lg btn-block">Tambah Data Guru</a>
    @if (session('status'))
    <div class="alert-success">
    {{session('status')}}
    </div>
    @endif
    <hr> -->
    
</div>
</div>
</div>
<div class="modal fade" id="importguru" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <form action="/admin/teacher/import" method="post" enctype="multipart/form-data">
      <div class="modal-body">
       @csrf
       <input type="file" name="file" value="file" required="required"> 
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
       </form>
    </div>
  </div>
@endsection
