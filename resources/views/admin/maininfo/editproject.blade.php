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

.card .card-body h3
{
	border: 1px #ccc solid;
	border-radius: 5px;
	padding: 10px;
}
img
{
	width: 200px;
}
input,textarea
{
	margin-bottom: 30px;
}
@stop
@section('content')


<div class="card w-100 m-4 ">
	<div class="card-header">
		<h4>Edit Project</h4>
		<a href="{{url('admin/projects')}}" class="fd-inline-block fa-lg">back</a>
	</div>
	<div class="card-body">
		<form class="" method="POST" action="{{url('admin/projects',$project->id)}}" enctype="multipart/form-data">
			@csrf()
			@method('PUT')
			<h5>Title :</h5>
			<input type="text" class="form-control" name="title" value="{{$project->title}}">

			<h5>Category</h5>
			<div class="form-group">
			    <select class="form-control" name="category" id="exampleFormControlSelect1">
			    	@foreach($categories as $category)
			    		<option value="{{$category->category}}">{{$category->category}}</option>
			    	@endforeach
			    </select>
			</div>

			<h5>image</h5>
			<img src="{{url('upload/projects',$project->image_name)}}">
			<input type="file" name="image" class="form-control">

			<h5>Content</h5>
			<textarea class="form-control" name="content">{{$project->content}}</textarea>

			<button class="btn btn-success px-5 py-2 mx-auto" type="submit">Ok</button>
		</form>
	</div>
</div>


@stop