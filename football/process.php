<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">  
    <script src="jquery-3.3.1.min.js"></script>
    <script src="bootstrap/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <title>Football</title>
</head>
</html>
<?php
    $data = $_POST;
    $errors = array();
    
    // Validate thông tin nhập vào
    require 'validate.php';

    if (count($errors) > 0) {
        $err_str = '<ul class="list-group">';
        foreach ($errors as $err) {
            $err_str .= '<li class="list-group-item">'.$err.'</li>';
        }   
        $err_str .= '</ul>';
        echo "<div class='alert alert-success text-center'><h4>Thông tin nhập vào không chính xác:<h4>".$err_str."<h4>Click vào <button type='button' class='btn btn-light' onclick='quay_lai()'>Đây</button> để quay lại trang trước</h4></div>";
        ?>
        <script>
            // Quay về trang trước đó
            function quay_lai(){
                history.back();
            }
        </script>
        <?php
    } 
    else{
        if (isset($_GET['id'])) {
            //Chỉnh sửa thông tin
            //Kết nối database
            $con = mysqli_connect('localhost', 'root', '', 'cauthu');
            //Viết câu SQL cập nhật cả dữ liệu trong bảng players
            $sql = "UPDATE `players` SET `name`='".$data['name']."',`age`='".$data['age']."',`national`='".$data['national']."',`position`='".$data['position']."',`salary`='".$data['salary']."' WHERE `id` = ".$_GET['id'];
            // Chạy câu SQL
            if ($result = mysqli_query($con,$sql)) {
                echo "<div class='alert alert-success text-center'><h2>Chỉnh sửa thông tin cầu thủ thành công. Click vào <a href='index.php'>đây</a> để về trang danh sách</h2></div>";
            }
            else{
                echo "<div class='alert alert-success text-center'><h2>Có lỗi xảy ra. Click vào <a href='index.php'>đây</a> để về trang danh sách</h2></div>";
            }
        } 
        else{
            //Thêm mới cầu thủ
            //Kết nối database
            $con = mysqli_connect('localhost', 'root', '', 'cauthu');
            //Viết câu SQL chèn dữ liệu vào trong bảng players
            $sql = "INSERT INTO `players` (`name`, `age`, `national`, `position`, `salary`) 
            VALUES ('".$data['name']."', '".$data['age']."', '".$data['national']."', '".$data['position']."', '".$data['salary']."');";
            //Chạy câu SQL
            if ($result = mysqli_query($con,$sql)) {
                echo "<div class='alert alert-success text-center'><h2>Thêm mới cầu thủ thành công. Click vào <a href='index.php'>đây</a> để về trang danh sách</h2></div>";
            }
            else{
                echo "<div class='alert alert-success text-center'><h2>Có lỗi xảy ra. Click vào <a href='index.php'>đây</a> để về trang danh sách</h2></div>";
            }
        }
    }
?>