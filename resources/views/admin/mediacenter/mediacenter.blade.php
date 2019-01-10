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

.add-form
{
	display: none;
}

@stop
@section('content')

<div class="card m-5 w-100">
	<div class="card-header">
		<h3 class="text-center">Activities</h3>
	</div>
	<div class="card-body">
		@foreach($errors->all() as $error)
			<div class="alert alert-danger">{{$error}}</div>
		@endforeach
		<button class="btn btn-primary add-btn">Add New Activity</button>
		<form class="my-4 add-form" method="POST" action="{{url('admin/mediacenter')}}" enctype="multipart/form-data">
			@csrf()
			<h5>Content :</h5>
			<textarea class="form-control mb-4" name="content"></textarea>

			<h5>Image :</h5>
			<input type="file" name="image" class="">

			<button type="submit" class="btn btn-success px-5 py-2 d-block mt-4">Add</button>
		</form>
		<div>
			<table class="table table-hover">
				<thead>
					<th>content :</th>
					<th>image :</th>
					<th>action :</th>
				</thead>
				<tbody>
					@foreach($activities as $activity)
						<tr>
							<td class="w-50">
								<p>{{$activity->content}}</p>
							</td>
							<td class="w-25">
								<img class="w-100" src="{{url('upload/activity',$activity->image_name)}}">
							</td>
							<td>
								<a href="{{url('admin/mediacenter',$activity->id)}}/edit" class="btn btn-warning">EDIT</a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

@stop
@section('js')

$('.add-btn').click(function(){
	$('.add-form').slideToggle(500);
})

@stop