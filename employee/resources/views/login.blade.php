<!DOCTYPE html>
<html class="no-js" lang="vi">

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="description" content="employee">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<base href="{{ asset('') }}">
	<!-- Thư viện css -->
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/all.css">
	<title> Trang đăng nhập </title>
</head>

<body>
	<div class="container">
		<div class="row mt-3 text-center justify-content-center">
			@if (session('mess'))
			<script>
				var messenger = '{{ session('mess') }}';
				alert(messenger);
			</script>
			@endif
			<div class="col-md-5">
				<h2 class="text-center">Trang đăng nhập</h2>
				<form method="POST">
					@csrf          
					<table class="table mt-2 text-center">
						<tr>
							<td><label class="ml-1">Username: </label></td>
							<td>
								<input type="text" name="username" class="form-control" value="{{ old('username') }}">
								@if ($errors->has("username"))
								<div class="text-danger"> {{ $errors->first('username') }}</div>
								@endif
							</td>
						</tr>
						<tr>
							<td><label class="ml-1">Password: </label></td>
							<td>
								<input type="password" name="password" class="form-control" value="{{ old('password') }}">
								@if ($errors->has("password"))
								<div class="text-danger"> {{ $errors->first('password') }}</div>
								@endif
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<input class="btn btn-success mr-3" type="submit" name="add_class" value="Login">
								<input class="btn btn-success mr-3" type="reset" value="Reset">
							</td> 
						</tr>
					</table>
				</form>
				<hr>
			</div> 
		</div>
	</div>
	<!-- Thư viện js -->
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>

</html>
