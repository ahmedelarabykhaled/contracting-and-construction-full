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

input,textarea
{
	margin: 20px 0px;
}
p
{
	font-size: 16px;
}
.add-form
{
	display: none;
}
@stop
@section('content')

<div class="events w-100">
	<div class="card m-4 p-3">
		@if(session('messege'))
			<div class="alert-success alert ">
				{{session('messege')}}
			</div>
		@endif
		<div>
			<button class="btn btn-primary add-btn">add service</button>
		</div>
		<form method="POST" action="{{url('admin/services')}}" enctype="multipart/form-data" class="border p-3 add-form">
			@csrf()
			<h2 class="text-center">Add Service</h2>
			<input type="text" name="title" class="form-control">
			<textarea class="form-control" name="content"></textarea>
			<input type="file" name="image" class="d-block form-control">
			<button class="btn btn-success">Add Service</button>
		</form>
		<div class="my-4 border">
			<table class="table table-hover">
				<thead>
					<th>title</th>
					<th>content</th>
					<th>image</th>
					<th>action</th>
				</thead>
				<tbody>
					@foreach($services as $service)
						<tr>
							<td>
								<p>{{$service->title}}</p>
							</td>
							<td>
								<p>{{$service->content}}</p>
							</td>
							<td>
								<img src="{{url('upload/services',$service->image_name)}}" class="w-100">
							</td>
							<td class="text-center">
								<form method="GET" action="{{url('admin/services',$service->id)}}/edit">
									<button class="my-3 btn btn-warning" type="submit">edit</button>
								</form>
								<form method="POST" action="{{url('admin/services',$service->id)}}">
									@csrf()
									@method('DELETE')
									<button class="btn btn-danger">delete</button>
								</form>
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
	$('.add-form').slideToggle(300)
})

@stop