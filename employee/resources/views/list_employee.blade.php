@extends('master.master')

@section('title','Danh sách nhân viên')

@section('content')
<h1 class="col-12">Quản lý nhân viên</h1>
@if (session('mess'))
<script>
	var messenger = '{{ session('mess') }}';
	alert(messenger);
</script>
@endif
<form class="input-group mb-3 col-md-9 col-lg-9" method="GET" action="search-employee">
	<label class="mr-1"><strong>Nội dung tìm kiếm:</strong></label> 
	<div class="input-group-prepend">
		<select name="control" class="form-control">
			<option value="name">Tên NV</option>
			<option value="jobtitle" <?php if (old('control')=='jobtitle') echo 'selected'; ?>>Chức danh</option>
		</select>
	</div>
	<input type="text" name="keyword" class="form-control" placeholder="Tìm kiếm theo Tên nv hoặc Chức danh công việc..." value="{{ old('keyword') }}">
	<div class="input-group-append">
		<input type="submit" class="btn btn-primary" value="Tìm">
	</div>
</form>
@if ($errors->has("keyword"))
	<div class="text-danger"> {{ $errors->first('keyword') }}</div>
@endif
<table class="table table-bordered mt-2">
	<thead>
		<tr class="table-primary">
			<th>Tên nhân viên</th>
			<th>Ảnh đại diện</th>
			<th>Chức danh</th>
			<th>Sđt di động</th>
			<th>Email</th>
			<th>OPTIONS</th>
		</tr>
	</thead>
	@if(isset($employees) && count($employees) > 0)
	<tbody>
		@foreach ($employees as $employee)
			<tr>
				<td>{{ $employee->name }}</td>
				<td><img width="50" height="50" src="img/{{ $employee->photo }}"></td>
				<td>{{ $employee->jobtitle }}</td>
				<td>{{ $employee->cellphone }}</td>
				<td>{{ $employee->email }}</td>
				<td>
					<form method="GET" action="delete-employee/{{ $employee->id }}">
						<input class="btn btn-light btn-sm mb-1" onclick="window.location='edit-employee/{{ $employee->id }}'" type="button" value="SỬA"/> | 
						<input class="btn btn-light btn-sm mb-1" onclick="return confirm('Bạn có chắc muốn xóa nhân viên này không?');" type="submit" value="XÓA"/>
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
	<tfoot>
		<tr>
			<td colspan="6"> 
				<a class="btn btn-primary" href="add-employee">Thêm nhân viên</a>
			</td>
		</tr>
	</tfoot>
</table>
{{ $employees->links() }}
@endsection