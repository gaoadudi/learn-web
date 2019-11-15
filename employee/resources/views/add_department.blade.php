@extends('master.master')

@section('title','Thêm phòng ban')

@section('content')
@if (session('mess'))
<script>
	var messenger = '{{ session('mess') }}';
	alert(messenger);
</script>
@endif
<div class="col-md-5 col-sm-9 col-xs-12">
	<h2 class="text-center">Thêm phòng ban</h2>
	<form method="POST">
		@csrf
		<div class="form-group">
			<label class="ml-1">Tên phòng ban: </label>
			<input type="text" name="name" class="form-control underlined" value="{{ old('name') }}">
			@if ($errors->has("name"))
                <div class="text-danger"> {{ $errors->first('name') }}</div>
            @endif
		</div>
		<div class="form-group">
			<label class="ml-1">Điện thoại văn phòng: </label>
			<input type="text" name="officephone" class="form-control underlined" value="{{ old('officephone') }}">
			@if ($errors->has("officephone"))
                <div class="text-danger"> {{ $errors->first('officephone') }}</div>
            @endif
		</div>
		<div class="form-group">
			<label class="ml-1">Người quản lý: </label>
			<select name="manager" class="form-control">
				<option value="Manager 1" >Manager 1</option>
				<option value="Manager 2" <?php if (old('manager')=='Manager 2') echo 'selected'; ?>>Manager 2</option>
				<option value="Manager 3" <?php if (old('manager')=='Manager 3') echo 'selected'; ?>>Manager 3</option>
				<option value="Manager 4" <?php if (old('manager')=='Manager 4') echo 'selected'; ?>>Manager 4</option>
				<option value="Manager 5" <?php if (old('manager')=='Manager 5') echo 'selected'; ?>>Manager 5</option>
			</select>
		</div>
		<div class="form-group text-center">
			<input class="btn btn-success mr-3" type="submit" value="Thêm">
			<input class="btn btn-success mr-3" type="reset" value="Reset">
			<a class="btn btn-primary" href="list-department">Cancel</a>
		</div>
	</form>
</div>
@endsection