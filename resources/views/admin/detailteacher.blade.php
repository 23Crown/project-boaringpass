@extends('layout.basiclayout')

@section('content')

<div class="card text-center  mx-auto d-block" >
<img src="{{ asset('storage/' .$teacher['foto_profil']) }}" class="img-profile rounded-circle mt-3" width="240px" height="240px">

              <div class="card-body">
    <h1 class="card-title">{{$teacher->nama_guru}}</h1>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item ">{{$teacher->nip}}</li>
    <li class="list-group-item ">{{$teacher->alamat}}</li>
    <li class="list-group-item ">{{$teacher->email}}</li>
  </ul>

    @if(Auth()->user()->role == 'guru')
    <a href="{{$teacher->id}}/editfp" class="btn btn-secondary m-1">Ganti Foto Profil</a>
    <a href="{{$teacher->id}}/edit" class="btn btn-primary m-1">Edit</a>
    @endif
    @if(Auth()->user()->role == 'admin')
    <form action="/admin/teacher/{{$teacher->id}}" onsubmit="return confirm('Tekan OK Untuk Menghapus Data')" method="post" class="d-inline"> 
    @method('delete')
    @csrf
    <button type="submit" class="btn btn-primary">Hapus</button>
    </form>
    @endif
</div>
						
						</div>
					</div>
</div>
@endsection
