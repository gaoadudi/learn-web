@extends('master.master')

@section('title','Sửa phòng ban')

@section('content')
@if (session('mess'))
<script>
	var messenger = '{{ session('mess') }}';
	alert(messenger);
</script>
@endif
<div class="col-md-5 col-sm-9 col-xs-12">
	<h2 class="text-center">Sửa phòng ban</h2>
	<form method="POST" action="">
		@csrf
		<div class="form-group">
			<label class="ml-1">Tên phòng ban: </label>
			<input type="text" name="name" class="form-control underlined" value="{{ $department->name }}">
			@if ($errors->has("name"))
                <div class="text-danger"> {{ $errors->first('name') }}</div>
            @endif
		</div>
		<div class="form-group">
			<label class="ml-1">Điện thoại văn phòng: </label>
			<input type="text" name="officephone" class="form-control underlined" value="{{ $department->officephone }}">
			@if ($errors->has("officephone"))
                <div class="text-danger"> {{ $errors->first('officephone') }}</div>
            @endif
		</div>
		<div class="form-group">
			<label class="ml-1">Người quản lý: </label>
			<select name="manager" class="form-control">
				<option value="Manager 1" >Manager 1</option>
				<option value="Manager 2" <?php if ($department->manager=='Manager 2') echo 'selected'; ?>>Manager 2</option>
				<option value="Manager 3" <?php if ($department->manager=='Manager 3') echo 'selected'; ?>>Manager 3</option>
				<option value="Manager 4" <?php if ($department->manager=='Manager 4') echo 'selected'; ?>>Manager 4</option>
				<option value="Manager 5" <?php if ($department->manager=='Manager 5') echo 'selected'; ?>>Manager 5</option>
			</select>
		</div>
		<div class="form-group text-center">
			<input class="btn btn-success mr-3" type="submit" value="Sửa">
			<input class="btn btn-success mr-3" type="reset" value="Reset">
			<a class="btn btn-primary" href="list-department">Cancel</a>
		</div>
	</form>
	<hr>
	<!--Phần thêm nhân viên vào phòng ban-->
	<form class="input-group" method="GET" action="add-employee-depart/{{ $department->id }}">
		<label class="ml-1">Nhân viên: </label>
		<select name="id_employ" class="form-control ml-1">
			@if(isset($employees) && count($employees) > 0)
			@foreach ($employees as $employee) 
				<option value="{{ $employee->id }}">{{ $employee->name }} -- {{ $employee->jobtitle }}</option>
			@endforeach
			@else 
				<option value="">Tên NV -- Chức danh</option>
			@endif
		</select>

		<div class="input-group-append">
			<input class="btn btn-success btn-sm" type="submit" value="THÊM"/>
		</div>
	</form>
	@if ($errors->has("id_employ"))
        <div class="text-danger"> {{ $errors->first('id_employ') }}</div>
    @endif
</div>
<!--Phần hiển thị danh sách nhân viên trong phòng ban-->
<h3 class="col-12 text-center mt-2">Danh sách nhân viên trong phòng ban</h3>
<table class="table table-bordered mt-2">
	<thead>
		<tr class="table-primary">
			<th>Tên nhân viên</th>
			<th>Ảnh đại diện</th>
			<th>Chức danh</th>
			<th>Sđt di động</th>
			<th>Email</th>
			<th>OPTION</th>
		</tr>
	</thead>
	@if(isset($employees2) && count($employees2) > 0)
	<tbody>
		@foreach ($employees2 as $employee2)
			<tr>
				<td>{{ $employee2->name }}</td>
				<td><img width="50" height="50" src="img/{{ $employee2->photo }}"></td>
				<td>{{ $employee2->jobtitle }}</td>
				<td>{{ $employee2->cellphone }}</td>
				<td>{{ $employee2->email }}</td>
				<td>
					<form method="GET" action="delete-employee-depart/{{ $employee2->id }}">
						<input class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc muốn xóa nhân viên khỏi phòng ban này không?');" type="submit" value="XÓA"/>
					</form>
				</td>
			</tr>
		@endforeach
	</tbody>
	@else
	<tbody>
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
	</tbody>
	@endif
</table>
@endsection