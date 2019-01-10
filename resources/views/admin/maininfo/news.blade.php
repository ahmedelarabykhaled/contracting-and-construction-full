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

.news p
{
	font-size: 16px;
}
.news .add-form
{
	display: none;
}
textarea
{
	height: 200px;
}
.edit-row
{
	display: none;
}
@stop
@section('content')

<div class="news w-100 m-4">
	<div class="card w-100 p-3">
		
		<div>
			<button class="btn btn-primary add-btn">Add New News</button>
			<form class="add-form border p-2" method="POST" action="{{url('admin/news')}}">
				@csrf()
				<p>Add News <span class="btn btn-danger float-right add-close">Close</span> </p>
				<textarea class="form-control" name="content"></textarea>
				<button class="my-2 btn btn-success">Add</button>
			</form>
			<div class="container">
				@foreach($news as $n)

				<!-- edit content -->
				<!-- <div class="row p-4 border mt-4"> -->
					
					<form method="POST" action="{{url('admin/news',$n->id)}}" class="edit-row row p-4 mt-4" id="edit-{{$n->id}}">
						@csrf()
						@method('PUT')
						<p class="btn btn-danger my-2" onclick="close_edit({{$n->id}})">close</p>
						<div class="col-9">
							<textarea class="form-control" name="edited_content">{{$n->content}}</textarea>
						</div>
						<div class="col-2">
							<button class="btn btn-success">OK</button>
						</div>
					</form>
				<!-- </div> -->

				<!-- show content -->
				<div class="row p-4 border mt-4" id="show-{{$n->id}}">
					<div class="col-9">
						<p class="">{{$n->content}}</p>
					</div>
					<div class="col-1">
						<button class="btn btn-warning" onclick="edit({{$n->id}})">Edit</button>
					</div>
					<div class="col-2">
						<form method="POST" action="{{url('admin/news',$n->id)}}">
							@csrf()
							@method('DELETE')
							<button class="btn btn-danger" type="submit">Delete</button>
						</form>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</div>


@stop
@section('js')

$('.add-btn').click(function(){
	$(this).hide()
	$('.add-form').slideDown(100)
})

$('.add-close').click(function(){
	$('.add-form').slideUp(100,function(){
	$('.add-btn').show()
})
})

function edit(id){
	$('#show-'+id).slideUp(300,function(){
	$('#edit-'+id).slideDown(300)
})
}

function close_edit(id){
	$('#edit-'+id).slideUp(300,function(){
	$('#show-'+id).slideDown(300)
})
}

@stop