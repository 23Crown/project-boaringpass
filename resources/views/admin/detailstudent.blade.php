@extends('layout.basiclayout')

@section('content')

<div class="row text-center">

            <div class="col-lg">
            
              <!-- Circle Buttons -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">DATA DIRI</h6>
                </div>
                
        
                <div class="card-body text-center">
                <img src="{{ asset('storage/' .$student['foto_profil']) }}" class="img-profile rounded-circle  mx-auto d-block pt-2" width="240px" height="240px">
                <ul class="list-group list-group-flush">
  <li class="list-group-item ">{{$student->nama_siswa}}</li>
    <li class="list-group-item ">{{$student->nisn}}</li>
    <li class="list-group-item ">{{$student->jurusan}}</li>
    <li class="list-group-item ">{{$student->alamat}}</li>
    <li class="list-group-item ">{{$student->kelas}}</li>
    <li class="list-group-item ">{{$student->email}}</li>
  </ul> 

    @if(Auth()->user()->role == 'admin')
    <a href="{{$student->id}}/editfp" class="btn btn-primary m-1">Ganti Foto Profil</a>
    <a href="{{$student->id}}/edit" class="btn btn-primary m-1">Edit</a>
   
    <form action="/admin/student/{{$student->id}}" onsubmit="return confirm('Tekan OK Untuk Menghapus Data')"
     method="post" class="d-inline"> 
    @method('delete')
    @csrf
    <button type="submit" class="btn btn-primary">Hapus</button>
    </form>
    @endif  
              <div class="mt-3">
              <div class="card shadow mb-4 ">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Catatan</h6>
                  
                </div>
                <div class="card-body">
                <div class="text-center">
                  @if(Auth()->user()->role == 'kesiswaan')
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalcatatan">
  Tambah Catatan
</button>
          @endif
          </div>
  <div class="modal fade" id="modalcatatan" tabindex="-1" aria-labelledby="modalcatatanLabel" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
  <div class="modal-header">
  <h5 class="modal-title" id="modalcatatanLabel">Tambah Catatan</h5>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span>
  </button>
  </div>
  <div class="modal-body">
  <form method="post" action="/student/{{$student->id}}/addcatatan">
    @csrf
    
    <div class="form-group">
    <label for="catatan">Catatan</label>
    <input type="text" id="catatan" class="form-control @error('catatan') is-invalid @enderror" placeholder="Silakan Masukan Catatan" name="catatan"
    value="{{old('catatan')}}">
    @error('catatan')
    <div class="invalid-feedback">
        {{$message}}
      </div>
    @enderror
    <div class="form-group">
    <label for="tanggal">Tanggal</label>
    <input type="date" id="tanggal" class="form-control @error('tanggal') is-invalid @enderror" placeholder="Silakan Masukan Tanggal" name="tanggal"
    value="{{old('tanggal')}}">
    @error('tanggal')
    <div class="invalid-feedback">
        {{$message}}
      </div>
    @enderror
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
      <table class="table table-bordered mt-4">
  <thead>
    <tr>
      <th scope="col">NO</th>
      <th scope="col">CATATAN</th>
      <th scope="col">TANGGAL</th>
    </tr>
  </thead>
  <tbody>
  @foreach($student->catatan as $catat)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$catat->catatan}}</td>
      <td>{{$catat->tanggal}}</td>
      @endforeach      
  </tbody>
  </div>
</table>
<div class="text-center mb-4">
<form action="/admin/student/{{$student->id}}/deletecatatan" onsubmit="return confirm('Tekan OK Untuk Menghapus Catatan')"
     method="post" class="d-inline"> 
    @method('delete')
    @csrf
    @if(Auth()->user()->role == 'kesiswaan')
    <button type="submit" class="btn btn-danger">Hapus Semua Catatan</button></td>
    </tr>
    @endif
      </form>
      </div>
                </div>


            

              <div class="card shadow mb-4">
                
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">BOARDING PASS</h6>
                </div>
                <div class="card-body text-center">
          @if(Auth()->user()->role == 'guru')
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Tambah Mapel
</button>
          @endif
          <table class="table table-bordered mt-4">
  <thead>
    <tr>
      <th scope="col">NO</th>
      <th scope="col">MATA PELAJARAN & NAMA GURU</th>
      <th scope="col">CATATAN</th>
      <th scope="col">TANDAN TANGAN</th>
      <th scope="col">ACTION</th>
    </tr>
  </thead>
  <tbody>
  @foreach($student->mapel as $mpl)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$mpl->nama_mapel}}</td>
      <td>{{$mpl->status}}</td>
      <td><img src="{{ asset('storage/' .$mpl['ttd']) }}" class="img-profile   mx-auto d-block pt-2" width="240px" height="240px"></td>
      <td>
      @if(Auth()->user()->role == 'guru')
      <a href="{{$mpl->id}}/editmp" class="btn btn-primary">EDIT CATATAN</a>
      <a href="{{$mpl->id}}/ttd" class="btn btn-warning m-1">TANDA TANGAN</a></td>
      @endif
      @endforeach      
  </tbody>
  </div>
</table>
      <form action="/admin/student/{{$student->id}}/deletemp" onsubmit="return confirm('Tekan OK Untuk Menghapus Mapel')"
     method="post" class="d-inline"> 
    @method('delete')
    @csrf
    @if(Auth()->user()->role == 'admin')
    <button type="submit" class="btn btn-danger">Hapus Semua Mata Pelajaran</button></td>
    </tr>
    @endif
      </form>
</div>
</div>
@if(Auth()->user()->role != 'siswa')
   
      <a href="/student/{{$student->id}}/lembarprint" class="btn btn-sm btn-danger"> Print</a>
    @endif


</div>
            </div>            
</div>
              </div>
 </div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Mapel</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="/student/{{$student->id}}/addmapel">
    @csrf
    
    <div class="form-group">
    <label for="nama_mapel">Mata Pelajaran & Nama Guru</label>
    <input type="text" id="nama_mapel" class="form-control @error('nama_mapel') is-invalid @enderror" placeholder="Silakan Masukan Mata Pelajaran & Nama Guru" name="nama_mapel"
    value="{{old('nama_mapel')}}">
    @error('nama_mapel')
    <div class="invalid-feedback">
        {{$message}}
      </div>
    @enderror
    <div class="form-group">
    <label for="status">Status</label>
    <input type="text" id="status" class="form-control @error('status') is-invalid @enderror" placeholder="Silakan Masukan Status" name="status"
    value="{{old('status')}}">
    @error('status')
    <div class="invalid-feedback">
        {{$message}}
      </div>
    @enderror
      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
      </div>
    </div>
</div>

</div>

@endsection
