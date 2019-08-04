<?php
include "layout/header.php";
?>
<div class="container">
    <div class="row mt-3 justify-content-center">
        <div class="col-md-5">
            <h2 class="text-center">Sửa sinh viên</h2>
            <form method="POST" action="<?php echo create_link(array('c'=>'student', 'a'=>'edit', 'id'=>$data['id'])); ?>">
                <div class="form-group">
                    <label class="ml-1">Mã Sinh Viên: </label>
                    <input type="text" name="ma" class="form-control" value="<?php echo !empty($data['ma']) ? $data['ma'] : ''; ?>">
                    <?php if (!empty($errors['ma'])) echo $errors['ma']; ?>
                </div>
                <div class="form-group">
                    <label class="ml-1">Họ Và Tên: </label>
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
                    <a class="btn btn-primary" href="<?php echo create_link(array('c'=>'student', 'a'=>'list')); ?>">Hủy</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
include "layout/footer.php";
?>