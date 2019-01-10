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
<div class="sliderimages w-100 m-4">
	<div class="card w-100 p-4">

				@if(session('messege_success'))
					<div class="alert alert-success" role="alert">
					  {{session('messege_success')}}
					</div>
				@endif
				@if(session('messege_error'))
					<div class="alert alert-danger" role="alert">
					  {{session('messege_error')}}
					</div>
				@endif
				@if(session('messege_delete'))
					<div class="alert alert-danger" role="alert">
					  {{session('messege_delete')}}
					</div>
				@endif

		<div>
			<button class="btn btn-primary my-2 add-btn">Add Image</button>
		</div>
		<form method="POST" action="{{url('admin/sliderimages')}}" enctype="multipart/form-data" class="add-form p-3 border my-3">
			@csrf()
			<h2>Add Image</h2>
			<input type="file" name="image[]" class="form-control my-4 p-2" multiple>
			<button class="btn btn-success my-3 px-5 py-2">Add</button>
		</form>

		<table class="table table-hover">
			<thead>
				<th>Image </th>
				<th>Action</th>
			</thead>
			<tbody>
				@foreach($sliderimages as $image)
					<tr>
						<td class="w-50">
							<img src="{{url('upload/slider images',$image->name)}}" class="w-100">
						</td>
						<td>
							<form method="POST" action="{{url('admin/sliderimages',$image->id)}}">
								@csrf()
								@method('DELETE')
								<button class="btn btn-danger">Delete</button>
							</form>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>



		<table></table>
		
	</div>
</div>

@stop
@section('js')

$('.add-btn').click(function(){
	$('.add-form').slideToggle(100)
})

@stop