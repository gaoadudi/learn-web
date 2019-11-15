@extends('master.master')

@section('title','Sửa nhân viên')

@section('content')
@if (session('mess'))
<script>
	var messenger = '{{ session('mess') }}';
	alert(messenger);
</script>
@endif
<div class="col-md-5 col-sm-9 col-xs-12 mb-5">
	<h2 class="text-center">Sửa nhân viên</h2>
	<form method="POST" enctype="multipart/form-data" action="">
		@csrf
		<div class="form-group">
			<label class="ml-1">Tên nhân viên: </label>
			<input type="text" name="name" class="form-control underlined" value="{{ $employee->name }}">
			@if ($errors->has("name"))
                <div class="text-danger"> {{ $errors->first('name') }}</div>
            @endif
		</div>
		<div class="form-group">
			<label class="ml-1">Ảnh đại diện: </label>
			@if ($employee->photo != null)
			<img width="50" height="50" src="img/{{ $employee->photo }}">
			@endif
			<input type="file" name="photo" class="form-control mt-1" value="">
			@if ($errors->has("photo"))
                <div class="text-danger"> {{ $errors->first('photo') }}</div>
            @endif
		</div>
		<div class="form-group">
			<label class="ml-1">Chức danh: </label>
			<input type="text" name="jobtitle" class="form-control underlined" value="{{ $employee->jobtitle }}">
			@if ($errors->has("jobtitle"))
                <div class="text-danger"> {{ $errors->first('jobtitle') }}</div>
            @endif
		</div>
		<div class="form-group">
			<label class="ml-1">Sđt di động: </label>
			<input type="text" name="cellphone" class="form-control underlined" value="{{ $employee->cellphone }}">
			@if ($errors->has("cellphone"))
                <div class="text-danger"> {{ $errors->first('cellphone') }}</div>
            @endif
		</div>
		<div class="form-group">
			<label class="ml-1">Email: </label>
			<input type="text" name="email" class="form-control underlined" value="{{ $employee->email }}">
			@if ($errors->has("email"))
                <div class="text-danger"> {{ $errors->first('email') }}</div>
            @endif
		</div>
		<div class="form-group text-center">
			<input class="btn btn-success mr-3" type="submit" value="Sửa">
			<input class="btn btn-success mr-3" type="reset" value="Reset">
			<a class="btn btn-primary" href="list-employee">Cancel</a>
		</div>
	</form>
</div>
@endsection