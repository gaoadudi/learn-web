<?php
include "layout/header.php";
?>
<div class="container">
	<div class="row text-center justify-content-center mt-3">
		<h1 class="col-12">Quản lý sinh viên</h1>
		<form class="input-group mb-3 col-md-9 col-lg-9" method="POST" action="<?php echo create_link(array('c'=>'student', 'a'=>'list')); ?>">
			<label class="mr-1"><strong>Tìm kiếm:</strong></label> 
			<div class="input-group-prepend">
				<select name="control" class="form-control">
					<option value="ma">Mã Sinh Viên</option>
					<option value="ten" <?php if (!empty($dieuKien) && $dieuKien=='ten') echo 'selected'; ?>>Họ Và Tên</option>		
					option
				</select>
			</div>
			<input type="text" name="keyword" class="form-control" placeholder="Tìm kiếm theo mã sv hoặc giới tính..." value="<?php echo (!empty($_POST['keyword'])) ? $_POST['keyword'] : ''; ?>">
			<div class="input-group-append">
				<input type="submit" class="btn btn-primary" name="search" value="Tìm">
			</div>
		</form>
		<table class="table table-bordered mt-2">
			<thead>
				<tr class="table-primary">
					<th>Mã Sinh Viên</th>
					<th>Họ Và Tên</th>
					<th>Giới tính</th>
					<th>Ngày sinh</th>
					<th>Chức năng</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($data as $value) { ?>
					<tr>
						<td><?php echo $value['ma']; ?></td>
						<td><?php echo $value['ten']; ?></td>
						<td><?php echo $value['gioitinh']; ?></td>
						<td><?php echo date("d/m/Y", strtotime($value['ngaysinh'])); ?></td>
						<td>
							<form method="POST" action="<?php echo create_link(array('c'=>'student', 'a'=>'delete')); ?>">
								<input class="btn btn-light btn-sm mb-1" onclick="window.location='<?php echo create_link(array('c'=>'student', 'a'=>'edit', 'id'=>$value['id'])); ?>'" type="button" value="SỬA"/> | 
								<input type="hidden" name="id" value="<?php echo $value['id']; ?>"/>
								<input class="btn btn-light btn-sm mb-1" onclick="return confirm('Bạn có chắc muốn xóa không?');" type="submit" name="delete" value="XÓA"/>
							</form>
						</td>
					</tr>
				<?php } ?>
			</tbody>
			<tfoot>
				<tr>
					<td colspan="5"> 
						<a class="btn btn-primary" href="<?php echo create_link(array('c'=>'student', 'a'=>'add')); ?>">Thêm sinh viên</a>
					</td>
				</tr>
			</tfoot>
		</table>
	</div>
</div>
<?php
include "layout/footer.php";
?>