<?php
    // Lấy thông tin hiển thị lên để người dùng sửa
$id = isset($_GET["id"]) ? (int)$_GET["id"] : "";
if ($id){
    $data = get_by_value("lophoc", "id", $id);
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
    $sql = "SELECT * FROM sinhvien WHERE {$dieuKien} LIKE '%{$noiDung}%' AND idlop='{$id}'";     
    $data2 = get_execute($sql); 
}
else{
        // Câu truy vấn lấy tất cả sinh viên có trong lớp
    $sql = "SELECT * FROM sinhvien WHERE idlop='{$id}'";     
    $data2 = get_execute($sql); 
}

    // Lấy danh sách sinh viên không có trong lớp
$sql = "SELECT * FROM sinhvien WHERE idlop IS NULL";     
$data3 = get_execute($sql);

    // Nếu người dùng submit form
if (!empty($_POST['edit_class'])){
        // Lấy data
    $data['ma'] = isset($_POST['ma']) ? $_POST['ma'] : '';
    $data['ten'] = isset($_POST['ten']) ? $_POST['ten'] : '';
    

        // Validate thông tin
    $error = array();
        // Mã
    if (isset($data["ma"]) && $data["ma"] == ""){
        $error["ma"] = "Bạn chưa nhập mã lớp";
    }
        // Tên
    if (isset($data["ten"]) && $data["ten"] == ""){
        $error["ten"] = "Bạn chưa nhập tên lớp";
    }
        // Nếu ko lỗi thì update
    if (!$errors){
            // Bỏ phần tử id ở đầu
        array_shift($data);

        update("lophoc", $data, "id", $id);
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