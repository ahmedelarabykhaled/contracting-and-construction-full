@extends('layouts.user')
@section('style')
.para
{
	background-color: #eee;
}
@stop
@section('content')

<?php
	$info = ['about'=>5,'ceo letter'=>6,'osv'=>7];
?>

<div class="container-fluid p-5">
	<h2 class="text-center p-5">عن الشركه</h2>
	<div class="row p-5">
		<div class="col-md-6">
			<p class="text-right p-5">{{$maininfo[$info['about']]->content}} </p>
		</div>
		<div class="col-md-6">
			<iframe class="rounded" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3453.080235200467!2d31.249125585405928!3d30.06323452464079!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1458408e41c76537%3A0xd5f4c923d0cb3722!2z2KfZhNmC2KfZh9ix2Kk!5e0!3m2!1sar!2seg!4v1546925724794" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
		</div>
	</div>
</div>
<div class="p-5 text-center container-fluid para">
	<h4 class="">كلمه الرئيس التنفيذى</h4>
	<div class="row">
		<div class="col-9 mx-auto">
			<p class="p-lg-5 py-3">{{$maininfo[$info['ceo letter']]->content}}</p>
		</div>
	</div>
</div>
<div class="container-fluid p-5 text-center">
	<h3 class="py-4">الهيكل التنظيمى للشركه</h3>
	<div class="row">
		<div class="col-9 mx-auto">
			<img src="{{url('upload/osv',$maininfo[$info['osv']]->content)}}">
		</div>
	</div>
</div>

@stop