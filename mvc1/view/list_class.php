<?php
include "layout/header.php";
?>
<div class="container">
	<div class="row text-center justify-content-center mt-3">
		<h1 class="col-12">Quản lý lớp học</h1>
		<form class="input-group mb-3 col-md-9 col-lg-9" method="POST" action="<?php echo create_link(array('c'=>'class', 'a'=>'list')); ?>">
			<label class="mr-1"><strong>Tìm kiếm:</strong></label> 
			<div class="input-group-prepend">
				<select name="control" class="form-control">
					<option value="ma">Mã Lớp</option>
					<option value="ten" <?php if (!empty($dieuKien) && $dieuKien=='ten') echo 'selected'; ?>>Tên Lớp</option>
					option
				</select>
			</div>
			<input type="text" name="keyword" class="form-control" placeholder="Tìm kiếm theo mã lớp hoặc tên lớp..." value="<?php echo (!empty($_POST['keyword'])) ? $_POST['keyword'] : ''; ?>">
			<div class="input-group-append">
				<input type="submit" class="btn btn-primary" name="search" value="Tìm">
			</div>
		</form>
		<table class="table table-bordered mt-2">
			<thead>
				<tr class="table-primary">
					<th>Mã Lớp</th>
					<th>Tên Lớp</th>
					<th>Chức năng</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($data as $value) { ?>
					<tr>
						<td><?php echo $value['ma']; ?></td>
						<td><?php echo $value['ten']; ?></td>
						<td>
							<form method="POST" action="<?php echo create_link(array('c'=>'class', 'a'=>'delete')); ?>">
								<input class="btn btn-light btn-sm mb-1" onclick="window.location='<?php echo create_link(array('c'=>'class', 'a'=>'edit', 'id'=>$value['id'])); ?>'" type="button" value="SỬA"/> | 
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
						<a class="btn btn-primary" href="<?php echo create_link(array('c'=>'class', 'a'=>'add')); ?>">Thêm lớp</a>
					</td>
				</tr>
			</tfoot>
		</table>
	</div>
</div>
<?php
include "layout/footer.php";
?>