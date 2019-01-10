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

.add-form
{
	display: none;
}

@stop
@section('content')

<div class="photos w-100">
	<div class="card m-4 p-3">
		@if(session('messege'))
			<div class="alert alert-success" role="alert">
				{{session('messege')}}
			</div>
		@endif
		<div>
			<button class="btn btn-primary my-2 add-btn">Add Image</button>
		</div>
		<form method="POST" action="{{url('admin/photos')}}" enctype="multipart/form-data" class="border p-3 add-form">
			@csrf()
			<h3 class="mb-3">Add Photos</h3>
			<input type="file" name="image[]" multiple class="d-block form-control my-4">
			<button class="px-4 btn btn-success">Add</button>
		</form>
		<div class="my-4 container">
			@foreach($photos as $photo)
			<div class="row my-3">
				<div class="col-8">
					<img src="{{url('upload/photos album',$photo->name)}}" class="w-100">
				</div>
				<div class="col-3">
					<form method="POST" action="{{url('admin/photos',$photo->id)}}">
						@csrf()
						@method('DELETE')
						<button class="btn btn-danger">Delete</button>
					</form>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div>

@stop
@section('js')

$('.add-btn').click(function(){
	$('.add-form').slideToggle(300)
})

@stop