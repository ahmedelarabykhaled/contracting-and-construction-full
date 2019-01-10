@extends('layouts.user')
@section('content')


<div class="container">
	<h3 class="my-5 pt-5 text-center">مقالات عامه</h3>
	@foreach($articles as $article)
	@if($article->category == 1)
	<div class="row my-3">
		<div class="col-md-6">
			<p class="text-right">{{$article->content}} </p>
		</div>
		<div class="col-md-6">
			<img src="{{url('assets/images/1.jpg')}}" class="w-100">
		</div>
	</div>
	@endif
	@endforeach
</div>

<div class="container">
	<h3 class="my-5 pt-5 text-center">مقالات  متخصصه</h3>
	@foreach($articles as $article)
	@if($article->category == 2)
	<div class="row my-3">
		<div class="col-md-6">
			<img src="{{url('assets/images/1.jpg')}}" class="w-100">
		</div>
		<div class="col-md-6">
			<p class="text-right">{{$article->content}} </p>
		</div>
	</div>
	@endif
	@endforeach
</div>

@stop