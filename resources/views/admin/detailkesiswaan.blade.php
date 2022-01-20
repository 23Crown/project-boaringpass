@extends('layout.basiclayout')

@section('content')

<div class="card text-center  mx-auto d-block" >
<div class="card-body">
    <h1 class="card-title">{{$kesiswaan->nama}}</h1>
  </div>

    <form action="/admin/kesiswaan/{{$kesiswaan->id}}" onsubmit="return confirm('Tekan OK Untuk Menghapus Data')" method="post" class="d-inline"> 
    @method('delete')
    @csrf
    <button type="submit" class="btn btn-primary">Hapus</button>
    </form>


</div>
@endsection