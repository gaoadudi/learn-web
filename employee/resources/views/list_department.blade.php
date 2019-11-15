@extends('master.master')

@section('title','Danh sách phòng ban')

@section('content')
<h1 class="col-12">Quản lý phòng ban</h1>
@if (session('mess'))
<script>
	var messenger = '{{ session('mess') }}';
	alert(messenger);
</script>
@endif
<table class="table table-bordered mt-2">
	<thead>
		<tr class="table-primary">
			<th>Tên phòng ban</th>
			<th>Điện thoại văn phòng</th>
			<th>Người Quản lý</th>
			<th>OPTIONS</th>
		</tr>
	</thead>
	@if(isset($departments) && count($departments) > 0)
	<tbody>
		@foreach ($departments as $department)
			<tr>
				<td>{{ $department->name }}</td>
				<td>{{ $department->officephone }}</td>
				<td>{{ $department->manager }}</td>
				<td>
					<form method="GET" action="delete-department/{{ $department->id }}">
						<input class="btn btn-light btn-sm mb-1" onclick="window.location='edit-department/{{ $department->id }}'" type="button" value="SỬA"/> | 
						<input class="btn btn-light btn-sm mb-1" onclick="return confirm('Bạn có chắc muốn xóa phòng ban này không?');" type="submit" value="XÓA"/>
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
		</tr>
	</tbody>
	@endif
	<tfoot>
		<tr>
			<td colspan="4"> 
				<a class="btn btn-primary" href="add-department">Thêm phòng ban</a>
			</td>
		</tr>
	</tfoot>
</table>
{{ $departments->links() }}
@endsection