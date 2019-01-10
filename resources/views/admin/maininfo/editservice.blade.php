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

img
{
	width: 200px;
}
input,textarea 
{
	margin-bottom: 20px;
}

@stop
@section('content')

<div class="card w-100 m-4 ">
	<div class="card-header">
		<a href="{{url('admin/services')}}">back</a>
		<h2 class="text-center">Edit Service</h2>
	</div>
	<div class="card-body p-5">
		<form method="POST" action="{{url('admin/services',$service->id)}}">
			@csrf()
			@method('PUT')

			@if(session('messege'))
				<div class="alert alert-success">{{session('messege')}}</div>
			@endif

			<h2>title :</h2>
			<input type="text" name="title" class="form-control" value="{{$service->title}}">

			<h2>image :</h2>
			<img src="{{url('upload/services',$service->image_name)}}">
			<input type="file" name="image" class="form-control">

			<h2>content :</h2>
			<textarea class="form-control" name="content">{{$service->content}}</textarea>

			<button class="btn btn-success px-5 py-1" type="submit">Ok</button>
		</form>
	</div>
</div>

@stop