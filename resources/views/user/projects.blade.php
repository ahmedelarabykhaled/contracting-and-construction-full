@extends('layouts.user')
@section('style')
.border
{
	border-color: #333 !important;
}
@stop
@section('content')

<div class="container">
	<h2 class="text-center py-5">المشاريع</h2>
	<div class="row p-5">
		@foreach($categories as $category)
			<h3 class="rounded py-3 text-right w-100 border px-3">{{$category->category}}</h3>
			@foreach($category->projects as $project)
			<div class="col-md-6 p-4">
				<div class="card">
					<img src="{{url('upload/projects',$project->image_name)}}" class="card-img-top">
					<div class="card-body text-right">
						<h3>{{$project->title}}</h3>
						<p>{{$project->content}}</p>
					</div>
				</div>
			</div>
			@endforeach
		@endforeach
	</div>
</div>

@stop