<?php
    // Lấy thông tin hiển thị lên để người dùng sửa
    $id = isset($_GET["id"]) ? (int)$_GET["id"] : "";
    if ($id){
        $data = get_by_value("sinhvien", "id", $id);
    }
     
    // Nếu không có dữ liệu tức không tìm thấy sinh viên cần sửa
    if (!$data){
        $link = create_link(array('m'=>'student', 'a'=>'list.php'));
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
        include "libs/validate.php";
        $errors = validate_student($data);
         
        // Nếu ko lỗi thì update
        if (!$errors){
            // Bỏ phần tử idlớp ở cuối
            array_pop($data);
            // Bỏ phần tử id ở đầu
            array_shift($data);
            
            update("sinhvien", $data, "id", $id);
            ?>
            <script>
                alert("Sửa sinh viên thành công");
                window.location = "<?php echo create_link(array('m'=>'student', 'a'=>'list.php')); ?>";
            </script>
            <?php
        }
    }
     
    disconnect_db();
?>
 
<?php
    include "layout/header.php";
?>
<div class="container">
    <div class="row mt-3 justify-content-center">
        <div class="col-md-5">
            <h2 class="text-center">Sửa sinh viên</h2>
            <form method="POST" action="<?php echo create_link(array('m'=>'student', 'a'=>'edit.php', 'id'=>$data['id'])); ?>">
                <div class="form-group">
                    <label class="ml-1">Mã SV: </label>
                    <input type="text" name="ma" class="form-control" value="<?php echo !empty($data['ma']) ? $data['ma'] : ''; ?>">
                    <?php if (!empty($errors['ma'])) echo $errors['ma']; ?>
                </div>
                <div class="form-group">
                    <label class="ml-1">Tên SV: </label>
                    <input type="text" name="ten" class="form-control" value="<?php echo !empty($data['ten']) ? $data['ten'] : ''; ?>">
                    <?php if (!empty($errors['ten'])) echo $errors['ten']; ?>
                </div>
                <div class="form-group">
                    <label class="ml-1">Giới tính: </label>
                    <select name="gioitinh" class="form-control">
                        <option value="Nam" >Nam</option>
                        <option value="Nữ" <?php if (!empty($data['gioitinh']) && $data['gioitinh']=='Nữ') echo 'selected'; ?>>Nữ</option>
                    </select>
                    <?php if (!empty($errors['gioitinh'])) echo $errors['gioitinh']; ?>
                </div>
                <div class="form-group">
                    <label class="ml-1">Ngày sinh: </label>
                    <input type="date" name="ngaysinh" class="form-control" value="<?php echo !empty($data['ngaysinh']) ? $data['ngaysinh'] : ''; ?>">
                    <?php if (!empty($errors['ngaysinh'])) echo $errors['ngaysinh']; ?>
                </div>
                <div class="form-group text-center">
                    <input type="hidden" name="id" value="<?php echo $data['id']; ?>"/>
                    <input class="btn btn-success mr-3" type="submit" name="edit_student" value="Sửa">
                    <input class="btn btn-success mr-3" type="reset" value="Reset">
                    <a class="btn btn-primary" href="<?php echo create_link(array('m'=>'student', 'a'=>'list.php')); ?>">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
    include "layout/footer.php";
?>