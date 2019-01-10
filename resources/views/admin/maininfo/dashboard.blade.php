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
@section('content')

<div class="card w-100 m-5">
	<div class="card-header text-center" style="color: ">
		<h1>Active Website</h1>
	</div>
	<div class="card-body text-center pb-5">
		@if($maininfo[9]->content == true)
			<h2 class="py-5 d-inline float-left">The Website Is Active</h2>
			<form class="d-inline float-right m-5" method="POST" action="{{url('admin/dashboard/1')}} " ">
				@csrf()
				@method('PUT')
				<input type="hidden" name="content" value="0">
				<button class="btn btn-danger">Deactive</button>
			</form>
		@else
			@if($maininfo[9]->content == false)
				<h2 class="py-5 d-inline float-left">The Website Is deactive</h2>
				<form class="d-inline m-5 float-right" method="POST" action="{{url('admin/dashboard/1')}}">
					@csrf()
					@method('PUT')
					<input type="hidden" name="content" value="1">
					<button class="btn btn-success">Active</button>
				</form>
				@endif
		@endif
	</div>
</div>

@stop