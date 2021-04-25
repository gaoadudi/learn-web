<?php
    // Lấy thông tin hiển thị lên để người dùng sửa
    $id = isset($_GET["id"]) ? (int)$_GET["id"] : "";
    if ($id){
        $data = get_by_value("students", "id", $id);
    }
     
    // Nếu không có dữ liệu tức không tìm thấy sinh viên cần sửa
    if (!$data){
        $link = create_link(array('c'=>'student', 'a'=>'list'));
        header("location: $link");
    }
     
    // Nếu người dùng submit form
    if (!empty($_POST['edit_student'])){
        // Lấy data
        $data['coed'] = isset($_POST['code']) ? $_POST['code'] : '';
        $data['name'] = isset($_POST['name']) ? $_POST['name'] : '';
        $data['gender'] = isset($_POST['gender']) ? $_POST['gender'] : '';
        $data['birth'] = isset($_POST['birth']) ? $_POST['birth'] : '';
        $data['birth'] = date('Y-m-d', strtotime($data['birth']));

        // Validate thông tin
        include "libs/validate.php";
        $errors = validate_student($data);
         
        // Nếu ko lỗi thì update
        if (!$errors){
            // Bỏ phần tử idlớp ở cuối
            array_pop($data);
            // Bỏ phần tử id ở đầu
            array_shift($data);
            
            update("students", $data, "id", $id);
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