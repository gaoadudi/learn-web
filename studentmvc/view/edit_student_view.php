<?php
    include "layout/header.php";
?>
<div class="container">
    <div class="row mt-3 justify-content-center">
        <div class="col-md-5">
            <h2 class="text-center">Sửa sinh viên</h2>
            <form method="POST" action="<?php echo create_link(array('c'=>'student', 'a'=>'edit', 'id'=>$data['id'])); ?>">
                <div class="form-group">
                    <label class="ml-1">Mã SV: </label>
                    <input type="text" name="code" class="form-control" value="<?php echo !empty($data['code']) ? $data['code'] : ''; ?>">
                    <?php if (!empty($errors['code'])) echo $errors['code']; ?>
                </div>
                <div class="form-group">
                    <label class="ml-1">Tên SV: </label>
                    <input type="text" name="name" class="form-control" value="<?php echo !empty($data['name']) ? $data['name'] : ''; ?>">
                    <?php if (!empty($errors['name'])) echo $errors['name']; ?>
                </div>
                <div class="form-group">
                    <label class="ml-1">Giới tính: </label>
                    <select name="gender" class="form-control">
                        <option value="Nam" >Nam</option>
                        <option value="Nữ" <?php if (!empty($data['gender']) && $data['gender']=='Nữ') echo 'selected'; ?>>Nữ</option>
                    </select>
                    <?php if (!empty($errors['gender'])) echo $errors['gender']; ?>
                </div>
                <div class="form-group">
                    <label class="ml-1">Ngày sinh: </label>
                    <input type="date" name="birth" class="form-control" value="<?php echo !empty($data['birth']) ? $data['birth'] : ''; ?>">
                    <?php if (!empty($errors['birth'])) echo $errors['birth']; ?>
                </div>
                <div class="form-group text-center">
                    <input type="hidden" name="id" value="<?php echo $data['id']; ?>"/>
                    <input class="btn btn-success mr-3" type="submit" name="edit_student" value="Sửa">
                    <input class="btn btn-success mr-3" type="reset" value="Reset">
                    <a class="btn btn-primary" href="<?php echo create_link(array('c'=>'student', 'a'=>'list')); ?>">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
    include "layout/footer.php";
?>