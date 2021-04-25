<?php
    // Lấy thông tin hiển thị lên để người dùng sửa
    $id = isset($_GET["id"]) ? (int)$_GET["id"] : "";
    if ($id){
        $data = get_by_value("classes", "id", $id);
    }
     
    // Nếu không có dữ liệu tức không tìm thấy class cần sửa
    if (!$data){
        $link = create_link(array('c'=>'class', 'a'=>'list'));
        header("location: $link");
    }

    // Lấy danh sách sinh viên trong lớp
    if(!empty($_POST["search"]) && !empty($_POST["control"]) && !empty($_POST["keyword"])){
        $dieuKien = $_POST["control"];
        $noiDung = $_POST["keyword"];

        // Câu truy vấn lấy sinh viên theo tìm kiếm
        $sql = "SELECT * FROM students WHERE {$dieuKien} LIKE '%{$noiDung}%' AND id_class='{$id}'";     
        $data2 = get_execute($sql); 
    }
    else{
        // Câu truy vấn lấy tất cả sinh viên có trong lớp
        $sql = "SELECT * FROM students WHERE id_class='{$id}'";     
        $data2 = get_execute($sql); 
    }

    // Lấy danh sách sinh viên không có trong lớp
    $sql = "SELECT * FROM students WHERE id_class IS NULL";     
    $data3 = get_execute($sql);
     
    // Nếu người dùng submit form
    if (!empty($_POST['edit_class'])){
        // Lấy data
        $data['code'] = isset($_POST['code']) ? $_POST['code'] : '';
        $data['name'] = isset($_POST['name']) ? $_POST['name'] : '';
        $data['room'] = isset($_POST['room']) ? $_POST['room'] : '';

        // Validate thông tin
        include "libs/validate.php";
        $errors = validate_class($data);
         
        // Nếu ko lỗi thì update
        if (!$errors){
            // Bỏ phần tử id ở đầu
            array_shift($data);
            
            update("classes", $data, "id", $id);
            ?>
            <script>
                alert("Sửa lớp học thành công");
                window.location = "<?php echo create_link(array('c'=>'class', 'a'=>'list')); ?>";
            </script>
            <?php
        }
    }

    disconnect_db();
?>