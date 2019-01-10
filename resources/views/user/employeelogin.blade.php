@extends('layouts.user')
@section('style')

body
{
	min-height: 100%;
}
form
{
	min-width: 300px;
}

@stop
@section('content')

<div class="my-5 text-center py-5">
	<form class="w-25 mx-auto my-5" method="POST" action="{{url('employeelogin')}}">
		@csrf()
		<h2>موظفدخول</h2>
		<input type="text" name="email" class="form-control my-3" placeholder="email">
		<input type="password" name="password" class="form-control my-3" placeholder="password">
		<button type="submit" class="btn btn-success px-5 py-2">Login</button>
		<a href="{{url('employeeregister')}}" class="my-4 d-block">no registered yet</a>
	</form>
</div>

@stop