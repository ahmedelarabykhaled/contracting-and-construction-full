@extends('layouts.admin')
@section('active')

{{session(['dashboard'=>''])}}
{{session(['main'=>''])}}
{{session(['about'=>'active'])}}
{{session(['media center'=>''])}}
{{session(['articles'=>''])}}
{{session(['admins'=>''])}}
{{session(['profile'=>''])}}


@stop
@section('style')

h5
{
	margin-bottom: 30px;
}

@stop
@section('content')

<div class="card m-5 w-100">
	<div class="card-header">
		<h5 class="text-center">About Page</h5>
	</div>

<?php
	$info = ['about'=>5,'ceo letter'=>6,'osv'=>7];
?>

	<div class="card-body">
		@if(isset($edit))
		<form class="my-5" method="POST" action="{{url('admin/about/1')}}" enctype="multipart/form-data">
			@csrf()
			@method('PUT')
			<p>co about :</p>
			<textarea class="form-control mb-4" name="about">{{$maininfo[$info['about']]->content}} </textarea>

			<p>ceo letter :</p>
			<textarea class="form-control mb-4" name="letter">{{$maininfo[$info['ceo letter']]->content}}</textarea>

			<p>organizational structure :</p>
			<img src="{{url('upload/osv',$maininfo[$info['osv']]->content)}}" style="width: 200px;">
			<input type="file" name="osv">

			<button class="btn btn-success px-5 py-2 d-block mt-4">OK</button>
		</form>
		@else
		<div>
			<a href="{{url('admin/about/1')}}/edit" class="btn btn-warning my-5">EDIT</a>
			<p>Co About :</p>
			<h5 class="border p-3 rounded">{{$maininfo[$info['about']]->content}}</h5>

			<p>Ceo letter :</p>
			<h5 class="border p-3 rounded">{{$maininfo[$info['ceo letter']]->content}}</h5>

			<p>Co osv :</p>
			<div class="w-100 text-center">
				<img src="{{url('upload/osv',$maininfo[$info['osv']]->content)}}" class="w-75">
			</div>
		</div>
		@endif
	</div>
</div>

@stop