@extends('layout.loginlayout')
@section('loginform')
<form class="user" action="/auth/postlogin" method="post">
@csrf
@if (session('status'))
    <div class="alert-success text-center">
    {{session('status')}}
    </div>
    @endif
 <br>
<div class="form-group">
<input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" 
placeholder="Enter Email Address..." name="email">
</div>
<div class="form-group">
<input type="password" class="form-control form-control-user" id="exampleInputPassword" 
placeholder="Password" name="password">
</div>

<button type="submit" class="btn btn-primary btn-user btn-block">
Login
</button>
<hr>
</form>
<div class="text-center">

@endsection