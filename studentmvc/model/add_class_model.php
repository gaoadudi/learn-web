<?php
    // Nếu người dùng submit form
    if (!empty($_POST['add_class'])){
        // Lấy data
        $data['code'] = isset($_POST['code']) ? $_POST['code'] : '';
        $data['name'] = isset($_POST['name']) ? $_POST['name'] : '';
        $data['room'] = isset($_POST['room']) ? $_POST['room'] : '';
 
        // Validate thông tin
        include "libs/validate.php";
        $errors = validate_class($data);
         
        // Nếu ko lỗi thì insert
        if (!$errors){
            insert("classes", $data);
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