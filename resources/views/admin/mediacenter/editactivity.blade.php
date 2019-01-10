@extends('layouts.admin')
@section('active')

{{session(['dashboard'=>''])}}
{{session(['main'=>''])}}
{{session(['about'=>''])}}
{{session(['media center'=>'active'])}}
{{session(['articles'=>''])}}
{{session(['admins'=>''])}}
{{session(['profile'=>''])}}


@stop
@section('style')

img
{
	width: 200px;
}
textarea
{
	height: 200px;
}
@stop
@section('content')

<div class="card w-100 m-5">
	<div class="card-header">
		<h4>Edit Activity</h4>
	</div>
	<div class="card-body">
		<form method="POST" action="{{url('admin/mediacenter',$activity->id)}}" enctype="multipart/form-data">
			@csrf()
			@method('PUT')
			<p>Content :</p>
			<textarea class="text-right mb-4 form-control" name="content">{{$activity->content}}</textarea>

			<p>Image :</p>
			<img src="{{url('upload/activity',$activity->image_name)}}">
			<input type="file" name="image" class="d-block my-3">

			<button class="btn btn-success d-block px-5 py-2" type="submi">Ok</button>
		</form>
	</div>
</div>

@stop