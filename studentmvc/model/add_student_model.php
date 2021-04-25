<?php
    // Nếu người dùng submit form
    if (!empty($_POST["add_student"])){
        // Lấy data
        $data['code'] = isset($_POST['code']) ? $_POST['code'] : '';
        $data['name'] = isset($_POST['name']) ? $_POST['name'] : '';
        $data['gender'] = isset($_POST['gender']) ? $_POST['gender'] : '';
        $data['birth'] = isset($_POST['birth']) ? $_POST['birth'] : '';
        $data['birth'] = date('Y-m-d', strtotime($data['birth']));
 
        // Validate thông tin
        include "libs/validate.php";
        $errors = validate_student($data);
         
        // Nếu ko lỗi thì insert
        if (!$errors){
            insert("students", $data);
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