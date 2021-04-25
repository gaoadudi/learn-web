<?php
    include "layout/header.php";
?>
<div>
<div class="container">
    <div class="row mt-3 justify-content-center">
        <div class="col-md-5">
            <h2 class="text-center">Thêm sinh viên</h2>
            <form method="POST" action="<?php echo create_link(array('c'=>'student', 'a'=>'add')); ?>">
                <table class="table mt-2 text-center">
                    <tr>
                        <td><label class="ml-1">Mã SV: </label></td>
                        <td>
                            <input type="text" name="code" class="form-control" value="<?php echo !empty($data['code']) ? $data['code'] : ''; ?>">
                            <?php if (!empty($errors['code'])) echo $errors['code']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td><label class="ml-1">Tên SV: </label></td>
                        <td>
                            <input type="text" name="name" class="form-control" value="<?php echo !empty($data['name']) ? $data['name'] : ''; ?>">
                            <?php if (!empty($errors['name'])) echo $errors['name']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td><label class="ml-1">Giới tính: </label></td>
                        <td>
                            <select name="gender" class="form-control">
                                <option value="Nam" >Nam</option>
                                <option value="Nữ" <?php if (!empty($data['gender']) && $data['gender'] == 'Nữ') echo 'selected'; ?>>Nữ</option>
                            </select>
                            <?php if (!empty($errors['gender'])) echo $errors['gender']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td><label class="ml-1">Ngày sinh: </label></td>
                        <td>
                            <input type="date" name="birth" class="form-control" value="<?php echo !empty($data['birth']) ? $data['birth'] : ''; ?>">
                            <?php if (!empty($errors['birth'])) echo $errors['birth']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input class="btn btn-success mr-3" type="submit" name="add_student" value="Thêm">
                            <input class="btn btn-success mr-3" type="reset" value="Reset">
                            <a class="btn btn-primary" href="<?php echo create_link(array('c'=>'student', 'a'=>'list')); ?>">Cancel</a>
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