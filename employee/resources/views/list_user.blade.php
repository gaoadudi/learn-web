@extends('master.master')

@section('title','Danh sách người dùng')

@section('content')
<h1 class="col-12">Quản lý người dùng</h1>
@if (session('mess'))
<script>
	var messenger = '{{ session('mess') }}';
	alert(messenger);
</script>
@endif
<table class="table table-bordered mt-2">
	<thead>
		<tr class="table-primary">
			<th>Tên người dùng</th>
			<th>Email</th>
			<th>Quyền</th>
			<th>OPTIONS</th>
		</tr>
	</thead>
	@if(isset($users) && count($users) > 0)
	<tbody>
		@foreach ($users as $user)
			<tr>
				<td>{{ $user->username }}</td>
				<td>{{ $user->email }}</td>
				@if ($user->role==1)
				<td>Admin</td>
				@else
				<td>Normal</td>
				@endif
				<td>
					<form method="GET" action="delete-user/{{ $user->id }}">
						<input class="btn btn-light btn-sm mb-1" onclick="window.location='edit-user/{{ $user->id }}'" type="button" value="SỬA"/> | 
						<input class="btn btn-light btn-sm mb-1" onclick="window.location='edit-password/{{ $user->id }}'" type="button" value="ĐỔI MK"/> | 
						<input class="btn btn-light btn-sm mb-1" onclick="return confirm('Bạn có chắc muốn xóa người dùng này không?');" type="submit" value="XÓA"/>
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
			<td colspan="6"> 
				<a class="btn btn-primary" href="add-user">Thêm người dùng</a>
			</td>
		</tr>
	</tfoot>
</table>
{{ $users->links() }}
@endsection