<?php
    // Nếu người dùng submit form
if (!empty($_POST['add_class'])){
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
        // Nếu ko lỗi thì insert
    if (!$errors){
        insert("lophoc", $data);
        ?>
        <script>
            alert("Thêm lớp học thành công");
            window.location = "<?php echo create_link(array('c'=>'class', 'a'=>'list')); ?>";
        </script>
        <?php
    }
}

disconnect_db();
?>