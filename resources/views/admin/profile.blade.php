@extends('layouts.admin')
@section('active')

{{session(['dashboard'=>''])}}
{{session(['main'=>''])}}
{{session(['about'=>''])}}
{{session(['media center'=>''])}}
{{session(['articles'=>''])}}
{{session(['admins'=>''])}}
{{session(['profile'=>'active'])}}


@stop
@section('content')

<div class="card w-100 m-5">
	<div class="card-header">
		<h3 class="text-center">My Profile</h3>
	</div>
	<div class="card-body container">
		<div class="row">
			<div class="col-6">
				<p>name : {{$admin->name}} </p>
				<p>email : {{$admin->email}} </p>
			</div>
			<div class="col-6">
				@if($admin->image_name != null)
					<img src="{{url('upload/admins',$admin->image_name)}} " class="w-100 rounded">
				@else
					<img src="{{url('assets/images/dummy admin.jpg')}} " class="w-100 rounded">
				@endif
			</div>
		</div>
	</div>
</div>

@stop