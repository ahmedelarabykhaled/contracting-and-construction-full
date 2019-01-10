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
@section('content')


<div class="card w-100 m-5">
	<div class="card-header">
		<h3>Edit Article</h3>
	</div>
	<div class="card-body p-5">
		<form method="POST" action="{{url('admin/articles',$article->id)}} ">
			@csrf()
			@method('PUT')
			<p>Article Category :</p>
			<select class="form-control" name="category">
				<option value="1" <?php if($article->category == 1){echo "selected";} ?> >general</option>
				<option value="2" <?php if($article->category == 2){echo "selected";} ?>>specific</option>
			</select>

			<p class="mt-4">Article Content :</p>
			<textarea class="form-control" name="content" style="height: 200px;">{{$article->content}}</textarea>

			<button class="btn btn-success px-5 py-2 mt-5" type="submit">Ok</button>
		</form>
	</div>
</div>


@stop