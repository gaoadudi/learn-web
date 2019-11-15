@extends('master.master')

@section('title','Thay đổi mật khẩu')

@section('content')
@if (session('mess'))
<script>
	var messenger = '{{ session('mess') }}';
	alert(messenger);
</script>
@endif
<div class="col-md-5 col-sm-9 col-xs-12">
	<h2 class="text-center">Thay đổi mật khẩu</h2>
	<form method="POST" action="">
		@csrf
		<div class="form-group">
			<label class="ml-1">Mật khẩu cũ: </label>
			<input type="password" name="password_old" class="form-control underlined" value="{{ old('password_old') }}">
			@if ($errors->has("password_old"))
                <div class="text-danger"> {{ $errors->first('password_old') }}</div>
            @endif
		</div>
		<div class="form-group">
			<label class="ml-1">Mật khẩu mới: </label>
			<input type="password" name="password_new" class="form-control underlined" value="{{ old('password_new') }}">
			@if ($errors->has("password_new"))
                <div class="text-danger"> {{ $errors->first('password_new') }}</div>
            @endif
		</div>
		<div class="form-group">
			<label class="ml-1">Nhập lại Mật khẩu mới: </label>
			<input type="password" name="password_confirmation" class="form-control underlined" value="{{ old('password_confirmation') }}">
			@if ($errors->has("password_confirmation"))
                <div class="text-danger"> {{ $errors->first('password_confirmation') }}</div>
            @endif
		</div>
		<div class="form-group text-center">
			<input class="btn btn-success mr-3" type="submit" value="Sửa">
			<input class="btn btn-success mr-3" type="reset" value="Reset">
			<a class="btn btn-primary" href="list-user">Cancel</a>
		</div>
	</form>
</div>
@endsection