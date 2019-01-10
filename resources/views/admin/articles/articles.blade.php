@extends('layouts.admin')
@section('active')

{{session(['dashboard'=>''])}}
{{session(['main'=>''])}}
{{session(['about'=>''])}}
{{session(['media center'=>''])}}
{{session(['articles'=>'active'])}}
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
		<h3 class="text-center">Articles</h3>
	</div>
	<div class="card-body">
		@if(session('messege'))
			<div class="alert alert-success">{{session('messege')}} </div>
		@endif
		<button class="btn btn-primary my-4 add-btn">Add Article</button>
		<form class="add-form" method="POST" action="{{url('admin/articles')}}">
			@csrf()
			<h3>Article Category :</h3>
			<select class="form-control mb-5" name="category">
				<option value="1">General</option>
				<option value="2">Speecific</option>
			</select>

			<h3>Add Article :</h3>
			<textarea class="form-control" style="height: 200px;" name="content"></textarea>

			<button class="btn btn-success px-5 py-2 mt-3" type="submit">Add</button>
		</form>
		<div>
			<table class="table table-hover my-5">
				<thead>
					<th>category :</th>
					<th class="w-75">content :</th>
					<th>action :</th>
				</thead>
				<tbody>
					@foreach($articles as $article)
						<tr class="text-right">
							<td>
								<h5><?php if($article->category == 1){echo "general";}else{echo "specific";} ?></h5>
							</td>
							<td>
								<h5>{{$article->content}}</h5>
							</td>
							<td class="text-center">
								<a href="{{url('admin/articles',$article->id)}}/edit" class="btn btn-warning my-5">MODIFY</a>
								<form class="d-inline" method="POST" action="{{url('admin/articles',$article->id)}}">
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
</div>
@stop
@section('js')

$('.add-btn').click(function(){
	$('.add-form').slideToggle(500);
})

@stop