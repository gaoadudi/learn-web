<?php
    include "layout/header.php";
?>
<div class="container">
	<div class="row text-center justify-content-center mt-3">
		<h1 class="col-12">Quản lý sinh viên</h1>
		<form class="input-group mb-3 col-md-9 col-lg-9" method="POST" action="<?php echo create_link(array('c'=>'student', 'a'=>'list')); ?>">
			<label class="mr-1"><strong>Nội dung tìm kiếm:</strong></label> 
			<div class="input-group-prepend">
				<select name="control" class="form-control">
					<option value="code">Mã SV</option>
					<option value="gender" <?php if (!empty($dieuKien) && $dieuKien=='gender') echo 'selected'; ?>>Giới tính</option>
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
					<th>Mã SV</th>
					<th>Tên SV</th>
					<th>Giới tính</th>
					<th>Ngày sinh</th>
					<th>OPTIONS</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($data as $value) { ?>
					<tr>
						<td><?php echo $value['code']; ?></td>
						<td><?php echo $value['name']; ?></td>
						<td><?php echo $value['gender']; ?></td>
						<td><?php echo date("d/m/Y", strtotime($value['birth'])); ?></td>
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