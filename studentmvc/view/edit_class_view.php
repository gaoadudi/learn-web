<?php
    include "layout/header.php";
?>
<div>
<div class="container">
    <div class="row justify-content-center mt-3">
        <div class="col-md-5 col-sm-9 col-xs-12">
            <h2 class="text-center">Sửa lớp học</h2>
            <form method="POST" action="<?php echo create_link(array('c'=>'class', 'a'=>'edit', 'id'=>$data['id'])); ?>">
                <div class="form-group text-center">
                    <input type="hidden" name="id" value="<?php echo $data['id']; ?>"/>
                    <input class="btn btn-success mr-3" type="submit" name="edit_class" value="Sửa">
                    <input class="btn btn-success mr-3" type="reset" value="Reset">
                    <a class="btn btn-primary" href="<?php echo create_link(array('c'=>'class', 'a'=>'list')); ?>">Cancel</a>
                </div>
                <div class="form-group">
                    <label class="ml-1">Mã Lớp: </label>
                    <input type="text" name="code" class="form-control" value="<?php echo !empty($data['code']) ? $data['code'] : ''; ?>">
                    <?php if (!empty($errors['code'])) echo $errors['code']; ?>
                </div>
                <div class="form-group">
                    <label class="ml-1">Tên Lớp: </label>
                    <input type="text" name="name" class="form-control" value="<?php echo !empty($data['name']) ? $data['name'] : ''; ?>">
                    <?php if (!empty($errors['name'])) echo $errors['name']; ?>
                </div>
                <div class="form-group">
                    <label class="ml-1">Phòng học: </label>
                    <select name="room" class="form-control">
                        <option value="P.101-A2" >P.101-A2</option>
                        <option value="P.102-A2" <?php if (!empty($data['room']) && $data['room']=='P.102-A2') echo 'selected'; ?>>P.102-A2</option>
                        <option value="P.202-A2" <?php if (!empty($data['room']) && $data['room']=='P.202-A2') echo 'selected'; ?>>P.202-A2</option>
                        <option value="P.203-A2" <?php if (!empty($data['room']) && $data['room']=='P.203-A2') echo 'selected'; ?>>P.203-A2</option>
                        <option value="P.301-A2" <?php if (!empty($data['room']) && $data['room']=='P.301-A2') echo 'selected'; ?>>P.301-A2</option>
                        <option value="P.303-A2" <?php if (!empty($data['room']) && $data['room']=='P.303-A2') echo 'selected'; ?>>P.303-A2</option>
                    </select>
                    <?php if (!empty($errors['room'])) echo $errors['room']; ?>
                </div>
            </form>
            <form class="input-group" method="POST" action="<?php echo create_link(array('c'=>'class', 'a'=>'addStudent', 'idClass'=>$data['id'])); ?>">
                <label class="ml-1">Sinh viên: </label>
                <select name="idStudent" class="form-control ml-1">
                    <?php foreach ($data3 as $value3) { ?>
                        <option value="<?php echo $value3['id']; ?>"><?php echo $value3['code']; ?>--<?php echo $value3['name']; ?></option>
                    <?php } ?>   
                </select>
                <div class="input-group-append">
                    <input class="btn btn-success btn-sm" type="submit" name="addStudentClass" value="THÊM"/>
                </div>
            </form>
            <hr>
        </div>
        <!--Phần hiển thị danh sách sinh viên-->
        <h3 class="col-12 text-center">Danh sách sinh viên trong lớp</h3>
        <form class="input-group mb-3 col-md-9 col-lg-9" method="POST" action="<?php echo create_link(array('c'=>'class', 'a'=>'edit', 'id'=>$data['id'])); ?>">
            <label class="mr-1"><strong>Tìm kiếm sinh viên trong lớp:</strong></label> 
            <div class="input-group-prepend">
                <select name="control" class="form-control">
                    <option value="code">Mã SV</option>
                    <option value="gender" <?php if (!empty($dieuKien) && $dieuKien=='gender') echo 'selected'; ?>>Giới tính</option>
                </select>
            </div>
            <input type="text" name="keyword" class="form-control" placeholder="Tìm kiếm sinh viên theo mã sv hoặc giới tính..." value="<?php echo (!empty($_POST['keyword'])) ? $_POST['keyword'] : ''; ?>">
            <div class="input-group-append">
                <input type="submit" class="btn btn-primary" name="search" value="Tìm">
            </div>
        </form>
        <table class="table table-bordered text-center mt-2">
            <thead>
                <tr class="table-primary">
                    <th>Mã SV</th>
                    <th>Tên SV</th>
                    <th>Giới tính</th>
                    <th>Ngày sinh</th>
                    <th>CONTROL</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data2 as $value2) { ?>
                    <tr>
                        <td><?php echo $value2['code']; ?></td>
                        <td><?php echo $value2['name']; ?></td>
                        <td><?php echo $value2['gender']; ?></td>
                        <td><?php echo date("d/m/Y", strtotime($value2['birth'])); ?></td>
                        <td>
                            <form method="POST" action="<?php echo create_link(array('c'=>'class', 'a'=>'deleteStudent', 'idClass'=>$data['id'])); ?>">
                                <input type="hidden" name="idStudent" value="<?php echo $value2['id']; ?>"/>
                                <input class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc muốn xóa sinh viên khỏi lớp không?');" type="submit" name="deleteStudentClass" value="XÓA"/>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<?php
    include "layout/footer.php";
?>