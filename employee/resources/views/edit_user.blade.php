@extends('master.master')

@section('title','Sửa người dùng')

@section('content')
@if (session('mess'))
<script>
	var messenger = '{{ session('mess') }}';
	alert(messenger);
</script>
@endif
<div class="col-md-5 col-sm-9 col-xs-12">
	<h2 class="text-center">Sửa người dùng</h2>
	<form method="POST" action="">
		@csrf
		<div class="form-group">
			<label class="ml-1">Tên người dùng: </label>
			<input type="text" name="username" class="form-control underlined" value="{{ $user->username }}">
			@if ($errors->has("username"))
                <div class="text-danger"> {{ $errors->first('username') }}</div>
            @endif
		</div>
		<div class="form-group">
			<label class="ml-1">Email: </label>
			<input type="email" name="email" class="form-control underlined" value="{{ $user->email }}">
			@if ($errors->has("email"))
                <div class="text-danger"> {{ $errors->first('email') }}</div>
            @endif
		</div>
		<div class="form-group">
			<label class="ml-1">Quyền người dùng: </label>
			<select name="role" class="form-control">
				<option value="1" >Admin</option>
				<option value="2" <?php if ($user->role==2) echo 'selected'; ?>>Normal</option>
			</select>
		</div>
		<!--div class="form-group">
			<label class="ml-1">Mật khẩu: </label>
			<input type="password" name="password" class="form-control underlined" value="{{ old('password') }}">
			@if ($errors->has("password"))
                <div class="text-danger"> {{ $errors->first('password') }}</div>
            @endif
		</div>
		<div class="form-group">
			<label class="ml-1">Nhập lại Mật khẩu: </label>
			<input type="password" name="password_confirmation" class="form-control underlined" value="{{ old('password_confirmation') }}">
			@if ($errors->has("password_confirmation"))
                <div class="text-danger"> {{ $errors->first('password_confirmation') }}</div>
            @endif
		</div-->
		<div class="form-group text-center">
			<input class="btn btn-success mr-3" type="submit" value="Sửa">
			<input class="btn btn-success mr-3" type="reset" value="Reset">
			<a class="btn btn-primary" href="list-user">Cancel</a>
		</div>
	</form>
</div>
@endsection