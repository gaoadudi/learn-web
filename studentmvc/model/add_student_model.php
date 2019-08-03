<?php
    // Nếu người dùng submit form
    if (!empty($_POST["add_student"])){
        // Lấy data
        $data['ma'] = isset($_POST['ma']) ? $_POST['ma'] : '';
        $data['ten'] = isset($_POST['ten']) ? $_POST['ten'] : '';
        $data['gioitinh'] = isset($_POST['gioitinh']) ? $_POST['gioitinh'] : '';
        $data['ngaysinh'] = isset($_POST['ngaysinh']) ? $_POST['ngaysinh'] : '';
        $data['ngaysinh'] = date('Y-m-d', strtotime($data['ngaysinh']));
 
        // Validate thông tin
        include "libs/validate.php";
        $errors = validate_student($data);
         
        // Nếu ko lỗi thì insert
        if (!$errors){
            insert("sinhvien", $data);
            ?>
            <script>
                alert("Thêm sinh viên thành công");
                window.location = "<?php echo create_link(array('c'=>'student', 'a'=>'list')); ?>";
            </script>
            <?php
        }
    }
     
    disconnect_db();
?>