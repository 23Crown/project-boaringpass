@extends('layout.basiclayout')
@section('content')
<div class="text-center p-3">
<h1>BOARDING PASS</h1></div>
<table class="table text-center">
  <thead class="thead-dark">
    <tr>
      <th scope="col">NISN</th>
      <th scope="col">NAMA</th>
      <th scope="col">EMAIL</th>
      
    </tr>
  </thead>
  <tbody>
  @foreach($users as $user)
    <tr>
      <th scope="row"><a href="/admin/student/{{$user->student->get(0)->id}}">{{$user->student->get(0)->nisn}}<a/></th>
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
     
    
  </tbody>
@endforeach
</table>


@endsection
