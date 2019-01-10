@extends('layouts.admin')
@section('active')

{{session(['dashboard'=>''])}}
{{session(['main'=>''])}}
{{session(['about'=>''])}}
{{session(['media center'=>''])}}
{{session(['articles'=>''])}}
{{session(['admins'=>'active'])}}
{{session(['profile'=>''])}}


@stop
@section('style')

.add-form
{
	display: none;
}

@stop
@section('content')

<div class="card w-100 m-5">
	<div class="card-header">
		<h3 class="text-center">Admins</h3>
	</div>
	<div class="card-body">
		
		<button class="btn btn-primary add-btn">add admin</button>
		<form class="p-5 add-form" method="POST" action="{{url('admin/admins')}} " enctype="multipart/form-data">
			@csrf()
			<h2>Add Admin</h2>
			<input type="text" name="name" class="form-control my-3" placeholder="name...">
			<input type="email" name="email" class="form-control my-3" placeholder="email...">
			<input type="password" name="password" class="form-control my-3" placeholder="password...">
			<input type="file" name="image" class="form-control my-3">

			<button class="btn btn-success px-5 py-2">Add</button>
		</form>

		<table class="table table-striped table-hover">
			<thead>
				<th>Name :</th>
				<th>Email :</th>
				<th>Image :</th>
				<th>Action :</th>
			</thead>
			<tbody>
				@foreach($admins as $admin)
					<tr>
						<td class="w-25">{{$admin->name}}</td>
						<td class="w-25">{{$admin->email}}</td>
						<td class="w-25">
							@if($admin->image_name != null)
								<img src="{{url('upload/admins',$admin->image_name)}}" class="rounded-circle w-50">
							@else
								<img src="{{url('assets/images/dummy admin.jpg')}} " class="rounded-circle w-50">
							@endif
						</td>
						<td class="w-25">
							<form method="POST" action="{{url('admin/admins',$admin->id)}}" class="d-inline">
								@csrf()
								@method('DELETE')
								<button class="btn btn-danger" type="submit">DELETE</button>
							</form>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>

@stop
@section('js')

$('.add-btn').click(function(){
	$('.add-form').slideToggle(500);
})

@stop