@extends('layouts.user')
@section('content')


<div class="container-fluid">
	<h2 class="my-5 text-center">خدمات الشركه</h2>
	<div class="row">
		@foreach($services as $service)
			<div class="col-md-6 text-right">
				<div class="card m-4">
					<div class="card-img-top">
						<img src="{{url('upload/services',$service->image_name)}}" class="w-100">
					</div>
					<div class="card-body">
						<h3>{{$service->title}}</h3>
						<p>{{$service->content}}</p>
					</div>
				</div>
			</div>
		@endforeach
	</div>
</div>


@stop