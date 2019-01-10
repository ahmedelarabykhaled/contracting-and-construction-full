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
	margin-bottom: 20px;
}
.add-form
{
	display: none;
}
@stop
@section('content')


<div class="card w-100 m-4">
	<div class="card-header">
		<h2 class="text-center">Client Comment</h2>
	</div>
	<div class="card-body">
		<div>
			<button class="btn btn-primary add-btn my-3">add client comment</button>
		</div>
		<form method="POST" action="{{url('admin/clients')}}" class="add-form border p-3 my-3">
			@csrf()
			<h3 class="my-3">Add Client Comment :</h3>
			<h5>name :</h5>
			<input type="text" name="name" class="form-control">

			<h5>job :</h5>
			<input type="text" name="job" class="form-control">

			<h5>comment :</h5>
			<textarea class="form-control" name="comment"></textarea>

			<button class="btn btn-success px-5 py-1" type="submit">Add</button>
		</form>
		<div>
			<table class="table table-striped table-hover">
				<thead>
					<th>name :</th>
					<th>job :</th>
					<th>comment :</th>
					<th>action :</th>
				</thead>
				<tbody>
				@foreach($clients as $client)
					<tr>
						<td>
							<p>{{$client->name}}</p>
						</td>
						<td>
							<p>{{$client->job}}</p>
						</td>
						<td>
							<p>{{$client->comment}}</p>
						</td>
						<td class="text-center">
							<form action="{{url('admin/clients',$client->id)}}" method="POST" class="d-inline">
								@csrf()
								@method('DELETE')
								<button class="btn btn-danger">delete</button>
							</form>
							<form action="{{url('admin/clients',$client->id)}}/edit" method="GET" class="d-inline">
								@csrf()
								<button class="btn btn-warning">edit</button>
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