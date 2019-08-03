<?php
    // Nếu người dùng submit form
    if (!empty($_POST['add_class'])){
        // Lấy data
        $data['ma'] = isset($_POST['ma']) ? $_POST['ma'] : '';
        $data['ten'] = isset($_POST['ten']) ? $_POST['ten'] : '';
        $data['phonghoc'] = isset($_POST['phonghoc']) ? $_POST['phonghoc'] : '';
 
        // Validate thông tin
        include "libs/validate.php";
        $errors = validate_class($data);
         
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