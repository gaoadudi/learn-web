<?php
    // Nếu người dùng submit form
    if (!empty($_POST['add_student'])){
        // Lấy data
        $data['ma'] = isset($_POST['ma']) ? $_POST['ma'] : '';
        $data['ten'] = isset($_POST['ten']) ? $_POST['ten'] : '';
        $data['gioitinh'] = isset($_POST['gioitinh']) ? $_POST['gioitinh'] : '';
        $data['ngaysinh'] = isset($_POST['ngaysinh']) ? $_POST['ngaysinh'] : '';
        $data['ngaysinh'] = date('Y-m-d', strtotime($data['ngaysinh']));
 
        // Validate thông tin
        include "libs/validate.php";
        $errors = validate_student($data);
         
        // Nếu ko lỗi thì insert
        if (!$errors){
            insert("sinhvien", $data);
            ?>
            <script>
                alert("Thêm sinh viên thành công");
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
            <h2 class="text-center">Thêm sinh viên</h2>
            <form method="POST" action="<?php echo create_link(array('m'=>'student', 'a'=>'add.php')); ?>">
                <table class="table mt-2 text-center">
                    <tr>
                        <td><label class="ml-1">Mã SV: </label></td>
                        <td>
                            <input type="text" name="ma" class="form-control" value="<?php echo !empty($data['ma']) ? $data['ma'] : ''; ?>">
                            <?php if (!empty($errors['ma'])) echo $errors['ma']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td><label class="ml-1">Tên SV: </label></td>
                        <td>
                            <input type="text" name="ten" class="form-control" value="<?php echo !empty($data['ten']) ? $data['ten'] : ''; ?>">
                            <?php if (!empty($errors['ten'])) echo $errors['ten']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td><label class="ml-1">Giới tính: </label></td>
                        <td>
                            <select name="gioitinh" class="form-control">
                                <option value="Nam" >Nam</option>
                                <option value="Nữ" <?php if (!empty($data['gioitinh']) && $data['gioitinh'] == 'Nữ') echo 'selected'; ?>>Nữ</option>
                            </select>
                            <?php if (!empty($errors['gioitinh'])) echo $errors['gioitinh']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td><label class="ml-1">Ngày sinh: </label></td>
                        <td>
                            <input type="date" name="ngaysinh" class="form-control" value="<?php echo !empty($data['ngaysinh']) ? $data['ngaysinh'] : ''; ?>">
                            <?php if (!empty($errors['ngaysinh'])) echo $errors['ngaysinh']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input class="btn btn-success mr-3" type="submit" name="add_student" value="Thêm">
                            <input class="btn btn-success mr-3" type="reset" value="Reset">
                            <a class="btn btn-primary" href="<?php echo create_link(array('m'=>'student', 'a'=>'list.php')); ?>">Cancel</a>
                        </td> 
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<?php
    include "layout/footer.php";
?>