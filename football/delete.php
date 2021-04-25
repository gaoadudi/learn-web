<?php
    $id = $_GET['id'];
    $con = mysqli_connect('localhost', 'root', '', 'football');
    // Viết câu SQL lấy tất cả dữ liệu trong bảng players
    $sql = "DELETE FROM `players` WHERE `id`='".$id."'";
    // Chạy câu SQL
    if ($result = mysqli_query($con,$sql)) {
        ?>
        <script>
            alert("Xóa cầu thủ thành công");
            window.location = "index.php";
        </script>
        <?php
    }
    else{
        ?>
        <script>
            alert("Có lỗi xảy ra!");
            window.location = "index.php";
        </script>
        <?php
    }
?>