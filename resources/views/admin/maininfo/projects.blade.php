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
.add-form-1
{
	display:none;
}
.add-form-2
{
	display:none;
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


		<!-- add project -->
		<div>
			<button class="btn btn-primary add-btn-1">add projects</button>
		</div>
		<form method="POST" action="{{url('admin/projects')}}" enctype="multipart/form-data" class="border p-3 add-form-1">
			@csrf()
			<h2 class="text-center">Add Project</h2>
			<input type="text" name="title" class="form-control">
			 	<div class="form-group">
			    	<select class="form-control" name="category" id="exampleFormControlSelect1">
			    		@foreach($categories as $category)
				      	<option value="{{$category->category}}">{{$category->category}}</option>
				      	@endforeach
			    	</select>
				</div>
			<textarea class="form-control" name="content"></textarea>
			<input type="file" name="image" class="d-block form-control">
			<button class="btn btn-success">Add project</button>
		</form>

		<!-- add category -->
		<div>
			<button class="btn btn-primary my-3 add-btn-2">add project category</button>
		</div>
		<form method="POST" action="{{url('admin/projectcategory')}}" enctype="multipart/form-data" class="border p-3 add-form-2">
			@csrf()
			<h2 class="text-center">Add Project Category</h2>
			<input type="text" name="category" class="form-control">
			<button class="btn btn-success">Add project category</button>
		</form>
		<div class="my-4 border">
			<table class="table table-hover">
				<thead>
					<th>title</th>
					<th>title</th>
					<th>content</th>
					<th>image</th>
					<th>action</th>
				</thead>
				<tbody>
					@foreach($projects as $project)
						<tr>
							<td>
								<p>{{$project->title}}</p>
							</td>
							<td>
								<p>{{$project->category}}</p>
							</td>
							<td>
								<p>{{$project->content}}</p>
							</td>
							<td>
								<img src="{{url('upload/projects',$project->image_name)}}" class="w-100">
							</td>
							<td class="text-center">
								<form method="GET" action="{{url('admin/projects',$project->id)}}/edit">
									<button class="my-3 btn btn-warning" type="submit">edit</button>
								</form>
								<form method="POST" action="{{url('admin/projects',$project->id)}}">
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

$('.add-btn-1').click(function(){
	$('.add-form-1').slideToggle(300)
})
$('.add-btn-2').click(function(){
	$('.add-form-2').slideToggle(300)
})

@stop