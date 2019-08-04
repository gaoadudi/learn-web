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
    $errors = array();
    $error = array();
    /* VALIDATE CĂN BẢN */
        // Mã
    if (isset($data["ma"]) && $data["ma"] == ""){
        $error["ma"] = "Bạn chưa nhập mã sv";
    }
        // Tên
    if (isset($data["ten"]) && $data["ten"] == ""){
        $error["ten"] = "Bạn chưa nhập tên sv";
    }
        // Giới tính
    if (isset($data["gioitinh"]) && $data["gioitinh"] == ""){
        $error["gioitinh"] = "Bạn chưa nhập giới tính";
    }
        // Ngày sinh
    $today = date("Y-m-d");  
    $birth = $data["ngaysinh"]; 
    if (strtotime($birth) >= strtotime($today)) {
        $error["ngaysinh"] = "Ngày sinh không hợp lệ";
    }
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