@extends('layouts.user')
@section('content')


<div class="container">
	<h3 class="text-center my-5 pt-5">اتصل بنا</h3>
	<div class="row">
		<div class="col-md-6">
			<div class="row px-5">
				<div class="col-11 text-right">
					{{$maininfo[4]->content}}
				</div>
				<div class="col-1">phone</div>
			</div>
			<div class="row px-5">
				<div class="col-11 text-right">
					{{$maininfo[8]->content}}
				</div>
				<div class="col-1">adress</div>
			</div>
		</div>
		<div class="col-md-6">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3453.080235200467!2d31.249125585405928!3d30.06323452464079!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1458408e41c76537%3A0xd5f4c923d0cb3722!2z2KfZhNmC2KfZh9ix2Kk!5e0!3m2!1sar!2seg!4v1547014946354" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
		</div>
	</div>
</div>


@stop