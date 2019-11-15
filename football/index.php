<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">	
	<script src="jquery-3.3.1.min.js"></script>
	<script src="bootstrap/popper.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<title>Football</title>
</head>
<body>
	<?php 
		//Kết nối databse
		$con = mysqli_connect('localhost', 'root', '', 'cauthu');
		//Viết câu SQL lấy tất cả dữ liệu trong bảng players
		$sql="SELECT * FROM `players` ORDER BY `id`";
		//Chạy câu SQL
		$result=mysqli_query($con,$sql);
		    //Gắn dữ liệu lấy được vào mảng $data
		while ($row=mysqli_fetch_assoc($result)) {
			$data[] = $row;
		}
		$html = '';
		foreach ($data as $value) {
			$html .= '
			<tr role="row">
				<td>'.$value['id'].'</td>
				<td>'.$value['name'].'</td>
				<td>'.$value['age'].'</td>
				<td>'.$value['national'].'</td>
				<td>'.$value['position'].'</td>
				<td>'.$value['salary'].' $</td>
				<td><a href="edit.php?id='.$value['id'].'">Edit</a></td>
				<td><a href="delete.php?id='.$value['id'].'"> Delete</a></td>
			</tr>';
		}
	?>
	<div class="container">
		<div class="row text-center mt-3">
			<h1>Quản lý cầu thủ</h1>
			<table class="table table-bordered mt-2">
				<thead>
					<tr class="table-primary">
						<th>ID</th>
						<th>Tên cầu thủ</th>
						<th>Tuổi</th>
						<th>Quốc tịch</th>
						<th>Vị trí</th>
						<th>Lương</th>
						<th>Sửa</th>
						<th>Xóa</th>
					</tr>
				</thead>
				<tbody>
					<?php  
						echo $html;
					?>
				</tbody>
				<tfoot>
					<tr>
						<td colspan="8">
							<a class="btn btn-primary" href="add.php">Thêm cầu thủ</a>
						</td>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
</body>

</html>