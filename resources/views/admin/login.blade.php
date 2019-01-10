<!DOCTYPE html>
<html>
<head>
	<title>admin login</title>
	<link rel="stylesheet" type="text/css" href="{{url('assets/libs/css/bootstrap.min.css')}}">
	<style type="text/css">
		body,html
		{
			width: 100%;
			height: 100%;
		}
		.all
		{
			width: 100%;
			height: 100%;
			background-color: #f84;
			display: flex;
			justify-content: center;
			align-items: center;
		}
		form
		{
			width: 300px;
		}
	</style>
</head>
<body>
	<div class="all">
		<form method="POST" action="{{url('adminlogin')}} ">
			@csrf()
			<h2 class="text-center mb-5">Admin Login</h2>
			<input type="text" name="email" placeholder="email" class="form-control my-3">
			<input type="password" name="password" placeholder="password" class="form-control my-3">
			<div class="text-center">
				<button class="btn btn-dark" type="submit">Login</button>
			</div>
		</form>
	</div>
</body>
</html>