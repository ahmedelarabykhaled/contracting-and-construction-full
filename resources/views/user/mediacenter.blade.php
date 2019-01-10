@extends('layouts.user')
@section('content')

<div class="container">
	<h2 class="text-center pt-5">فعاليات الشركه</h2>
	<div class="row p-4">
		@foreach($activities as $activity)
		<div class="col-md-6 my-5">
			<p class="p-3 text-right">{{$activity->content}}</p>
		</div>
		<div class="col-md-6 my-5">
			<img src="{{url('upload/activity',$activity->image_name)}}" class="w-100 rounded">
		</div>
		@endforeach
	</div>
</div>

<div class="pb-5 pt-3" style="background-color: #ddd">
	<div class="mb-5">
		<h2 class="py-5 mt-5 mb-2 text-center">اخبار الشركه</h2>
		@foreach($news as $new)
		<p class="px-5 py-2 my-2 text-center col-9 mx-auto">{{$new->content}} </p>
		@endforeach
	</div>
</div>

<div class="m-5 p-5">
	<h2 class="text-center py-5">الصور</h2>
	<div class="owl-carousel owl-theme">
		@foreach($photos as $photo)
	    <div class="item">
	    	<img src="{{url('upload/photos album',$photo->name)}}" class="rounded">
	    </div>
	    @endforeach
	</div>
</div>

@stop
@section('js')

$('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    items: 2,
})

@stop