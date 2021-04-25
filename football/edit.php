<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
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
        $id = $_GET['id'];
        //Kết nối database
        $con = mysqli_connect('localhost', 'root', '', 'football');
        //Viết câu SQL lấy dữ liệu trong bảng players theo id
        $sql="SELECT * FROM `players` WHERE `id`= ".$id;
        //Chạy câu SQL
        $result=mysqli_query($con,$sql);
        //Gắn dữ liệu lấy được vào mảng $data
        while ($row=mysqli_fetch_assoc($result)) {
            $info = $row;
        }
    ?>
    <div class="container">
        <div class="row mt-3 justify-content-center">
            <div class="col-md-5">
                <form action="process.php?id=<?php echo $id ?>" method="POST">
                    <h2 class="text-center">Chỉnh sửa thông tin cầu thủ</h2>
                    <div class="form-group">
                        <label class="ml-1">Tên cầu thủ: </label>
                        <input type="text" name="name" class="form-control" value="<?php echo $info['name'] ?>">
                    </div>
                    <div class="form-group">
                        <label class="ml-1">Tuổi: </label>
                        <input type="text" name="age" class="form-control" value="<?php echo $info['age'] ?>">
                    </div>
                    <div class="form-group">
                        <label class="ml-1">Quốc tịch: </label>
                        <input type="text" name="national" class="form-control" value="<?php echo $info['national'] ?>">
                    </div>
                    <div class="form-group">
                        <label class="ml-1">Vị trí: </label>
                        <input type="text" name="position" class="form-control" value="<?php echo $info['position'] ?>">
                    </div>
                    <div class="form-group">
                        <label class="ml-1">Lương: </label>
                        <input type="text" name="salary" class="form-control" value="<?php echo $info['salary'] ?>">
                    </div>
                    <div class="form-group text-center">
                        <button class="btn btn-success mr-3" type="submit">Cập nhật</button>
                        <button class="btn btn-success mr-3" type="reset">Reset</button>
                        <a class="btn btn-primary" href="index.php">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>