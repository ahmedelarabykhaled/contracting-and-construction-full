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

.event img
{
	width: 100px;
}
.event p
{
	margin-top: 30px;
}
.event textarea
{
	height: 200px;
}
a
{
	font-size: 14px;
}
@stop
@section('content')

<div class="card m-4 p-5 w-100 event">
	
	<form method="POST" action="{{url('admin/events',$event->id)}}" class="border p-3" enctype="multipart/form-data">
		@csrf()
		@method('PUT')
		<h2 class="text-center"> <a href="{{url('admin/events')}}" class="float-left btn btn-link">back</a> {{$event->title}} Event</h2>
		<p>title</p>
		<input type="text" name="title" value="{{$event->title}}" class="form-control">

		<p>content</p>
		<textarea class="form-control" name="content">{{$event->content}}</textarea>

		<p>image</p>
		<img src="{{url('upload/events',$event->image_name)}}">
		<input type="file" name="image" class="form-control my-3">

		<button class="btn btn-success">Update</button>
	</form>
</div>

@stop