@extends('layouts.admin')
@section('active')

{{session(['dashboard'=>''])}}
{{session(['main'=>'active'])}}
{{session(['about'=>''])}}
{{session(['media center'=>''])}}
{{session(['articles'=>''])}}
{{session(['admins'=>''])}}
{{session(['profile'=>''])}}


@stop
@section('style')

input,textarea
{
	margin-bottom: 20px;
}

@stop
@section('content')

<div class="card m-4 w-100">
	<div class="card-header">
		<h5>Edit Client</h5>
		<a href="{{url('admin/clients')}}">back</a>
	</div>
	<div class="card-body">
		<form method="POST" action="{{url('admin/clients',$client->id)}}">
			@csrf()
			@method('PUT')
			<h3>name :</h3>
			<input type="text" name="name" class="form-control" value="{{$client->name}}">

			<h3>job :</h3>
			<input type="text" name="job" class="form-control" value="{{$client->job}}">

			<h3>comment</h3>
			<textarea class="form-control">{{$client->comment}}</textarea>

			<button class="px-5 py-2 btn btn-success" type="submit">Ok</button>
		</form>
	</div>
</div>

@stop