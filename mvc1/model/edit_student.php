<?php
    // Lấy thông tin hiển thị lên để người dùng sửa
$id = isset($_GET["id"]) ? (int)$_GET["id"] : "";
if ($id){
    $data = get_by_value("sinhvien", "id", $id);
}

    // Nếu không có dữ liệu tức không tìm thấy sinh viên cần sửa
if (!$data){
    $link = create_link(array('c'=>'student', 'a'=>'list'));
    header("location: $link");
}

    // Nếu người dùng submit form
if (!empty($_POST['edit_student'])){
        // Lấy data
    $data['ma'] = isset($_POST['ma']) ? $_POST['ma'] : '';
    $data['ten'] = isset($_POST['ten']) ? $_POST['ten'] : '';
    $data['gioitinh'] = isset($_POST['gioitinh']) ? $_POST['gioitinh'] : '';
    $data['ngaysinh'] = isset($_POST['ngaysinh']) ? $_POST['ngaysinh'] : '';
    $data['ngaysinh'] = date('Y-m-d', strtotime($data['ngaysinh']));
        // Validate thông tin
    $error = array();
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

        // Nếu ko lỗi thì update
    if (!$errors){
            // Bỏ phần tử id ở đầu
        array_shift($data);

        update("sinhvien", $data, "id", $id);
        ?>
        <script>
            alert("Sửa sinh viên thành công");
            window.location = "<?php echo create_link(array('c'=>'student', 'a'=>'list')); ?>";
        </script>
        <?php
    }
}
disconnect_db();
?>