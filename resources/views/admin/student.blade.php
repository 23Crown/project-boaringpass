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
          <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#importsiswa">
            Import Siswa Excel
          </button>
   <a href="/admin/createstudent" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i>Tambah Data Murid</a> 
    @endif
   
     </div>
         
          <!-- Content Row -->

          <div class="row">


    <div class="col-xl-10 col-lg-7">
      <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Daftar Murid</h6>
         </div>
<!-- Card Body -->
<div class="card-body">
    <table class="table ">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">NISN</th>
      <th scope="col">NAMA</th>
      <th scope="col">JURUSAN</th>
      <th scope="col">KELAS</th>
     
      
    </tr>
  </thead>
  <tbody>
  @foreach($student as $stdn)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td><a href="/admin/student/{{$stdn->id}}">{{$stdn->nisn}}</a></td>
      <td>{{$stdn->nama_siswa}}</td>
      <td>{{$stdn->jurusan}}</td>
      <td>{{$stdn->kelas}}</td>
      
    </tr>
@endforeach
  </tbody>
</table>
</div>
</div>
</div>
</div>
</div>
@endsection
<!-- Modal Import Siswa-->
<div class="modal fade" id="importsiswa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <form action="/admin/student/import" method="post" enctype="multipart/form-data">
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
</div>