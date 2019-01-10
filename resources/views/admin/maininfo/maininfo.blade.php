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

.maininfo .card
{
	height: auto !important;
}
.maininfo .card .card-body p
{
	margin-top: 20px !important;
}
.logo
{
	max-width: 200px;
}
.display-data h4
{
	border: 1px solid #ccc;
	padding: 10px;
	border-radius: 5px;
}
@stop
@section('content')


<div class="maininfo p-4 w-100">
	<div class="card w-100">
		<div class="card-header">
			<h3>Main Information</h3>
			@if(!isset($edit))
			<a href="{{url('admin/maininfo/1/edit')}}" class="btn btn-warning">Edit</a>
			@endif
		</div>
		<div class="card-body">
			@if(session('messege'))
				<div class="alert alert-success" role="alert">
				  {{session('messege')}}
				</div>
			@endif

			<?php
				$info = ['logo'=>0,'co name'=>1,'co activity'=>2,'co comment'=>3,'phone number'=>4,'co adress'=>8];
			?>


			@if(isset($edit))
				<form method="POST" action="{{url('admin/maininfo',1)}}" enctype="multipart/form-data">
					@csrf()
					@method('PUT')
					<p>Co Logo :</p>
					<img src="{{url('upload/logo',$maininfo[$info['logo']]->content)}}" class="rounded logo">
					<input type="file" name="logo" class="form-control">

					<p>Co Name :</p>
					<input type="text" name="co_name" class="form-control" value="{{$maininfo[$info['co name']]->content}}">

					<p>Co Activity :</p>
					<input type="text" name="co_activity" class="form-control" value="{{$maininfo[$info['co activity']]->content}}">

					<p>Co Comment:</p>
					<input type="text" name="co_comment" class="form-control" value="{{$maininfo[$info['co comment']]->content}}">

					<p>Co Phone :</p>
					<input type="text" name="phone_number" class="form-control" value="{{$maininfo[$info['phone number']]->content}}">

					<p>Co Adress :</p>
					<input type="text" name="co_adress" class="form-control" value="{{$maininfo[$info['co adress']]->content}}">

					<p>Social Media :</p>
					<div class="form-group container-fluid">
					 	<div class="row">
					 		<div class="col-sm-4 mx-3">
					 			<select class="form-control" name="icon" id="exampleFormControlSelect1">
							    	@foreach($icons as $icon)
							      		<option value="{{$icon->id}}">{{$icon->name}}</option>
							      	@endforeach
							    </select>
					 		</div>
					 		<div class="col-sm-4 mx-3">
					 			<input type="text" name="link" class="form-control" placeholder="link">
					 		</div>
					 	</div>
					</div>
					<table class="table table-hover">
						<thead>
							<th>name</th>
							<th>link</th>
							<th>action</th>
						</thead>
						<tbody>
							@foreach($icons as $icon)
							@if($icon->status == true)
								<tr>
									<th>{{$icon->name}}</th>
									<th>{{$icon->link}}</th>
									<th>
										<a href="{{url('admin/deleteicon',$icon->id)}}" class="btn btn-danger">delete</a>
									</th>
								</tr>
							@endif
							@endforeach
						</tbody>
					</table>

					<button type="Submit" class="btn btn-dark my-4">Submit</button>
				</form>

			@else
				<form class="display-data">
					<p>Co Logo :</p>
					<img src="{{url('upload/logo',$maininfo[$info['logo']]->content)}}" class="rounded logo">

					<p>Co Name :</p>
					<h4>{{$maininfo[$info['co name']]->content}}</h4>

					<p>Co Activity :</p>
					<h4>{{$maininfo[$info['co activity']]->content}}</h4>

					<p>Co Comment :</p>
					<h4>{{$maininfo[$info['co comment']]->content}}</h4>

					<p>Co Phone :</p>
					<h4>{{$maininfo[$info['phone number']]->content}}</h4>

					<p>Co Adree :</p>
					<h4>{{$maininfo[$info['co adress']]->content}}</h4>

					<p>Social Media :</p>
					<table class="table table-hover">
						<thead>
							<th>name :</th>
							<th>url :</th>
						</thead>
						<tbody>
							@foreach($icons as $icon)
							@if($icon->status == true)
								<tr>
									<td>
										<p>{{$icon->name}}</p>
									</td>
									<td>
										<p>{{$icon->link}}</p>
									</td>
								</tr>
							@endif
							@endforeach
						</tbody>
					</table>
				</form>
			@endif
		</div>
	</div>
</div>

@stop
					