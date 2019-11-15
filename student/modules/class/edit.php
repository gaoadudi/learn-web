<?php
    // Lấy thông tin hiển thị lên để người dùng sửa
    $id = isset($_GET["id"]) ? (int)$_GET["id"] : "";
    if ($id){
        $data = get_by_value("lophoc", "id", $id);
    }
     
    // Nếu không có dữ liệu tức không tìm thấy class cần sửa
    if (!$data){
        $link = create_link(array('m'=>'class', 'a'=>'list.php'));
        header("location: $link");
    }

    // Lấy danh sách sinh viên trong lớp
    if(!empty($_POST["search"]) && !empty($_POST["control"]) && !empty($_POST["keyword"])){
        $dieuKien = $_POST["control"];
        $noiDung = $_POST["keyword"];

        // Câu truy vấn lấy sinh viên theo tìm kiếm
        $sql = "SELECT * FROM sinhvien WHERE {$dieuKien} LIKE '%{$noiDung}%' AND idlop='{$id}'";     
        $data2 = get_execute($sql); 
    }
    else{
        // Câu truy vấn lấy tất cả sinh viên có trong lớp
        $sql = "SELECT * FROM sinhvien WHERE idlop='{$id}'";     
        $data2 = get_execute($sql); 
    }

    // Lấy danh sách sinh viên không có trong lớp
    $sql = "SELECT * FROM sinhvien WHERE idlop IS NULL";     
    $data3 = get_execute($sql);
     
    // Nếu người dùng submit form
    if (!empty($_POST['edit_class'])){
        // Lấy data
        $data['ma'] = isset($_POST['ma']) ? $_POST['ma'] : '';
        $data['ten'] = isset($_POST['ten']) ? $_POST['ten'] : '';
        $data['phonghoc'] = isset($_POST['phonghoc']) ? $_POST['phonghoc'] : '';

        // Validate thông tin
        include "libs/validate.php";
        $errors = validate_class($data);
         
        // Nếu ko lỗi thì update
        if (!$errors){
            // Bỏ phần tử id ở đầu
            array_shift($data);
            
            update("lophoc", $data, "id", $id);
            ?>
            <script>
                alert("Sửa lớp học thành công");
                window.location = "<?php echo create_link(array('m'=>'class', 'a'=>'list.php')); ?>";
            </script>
            <?php
        }
    }
     
    if (!empty($_POST['edit_class'])){

    }

    disconnect_db();
?>
 
<?php
    include "layout/header.php";
?>
<div class="container">
    <div class="row justify-content-center mt-3">
        <div class="col-md-5 col-sm-9 col-xs-12">
            <h2 class="text-center">Sửa lớp học</h2>
            <form method="POST" action="<?php echo create_link(array('m'=>'class', 'a'=>'edit.php', 'id'=>$data['id'])); ?>">
                <div class="form-group text-center">
                    <input type="hidden" name="id" value="<?php echo $data['id']; ?>"/>
                    <input class="btn btn-success mr-3" type="submit" name="edit_class" value="Sửa">
                    <input class="btn btn-success mr-3" type="reset" value="Reset">
                    <a class="btn btn-primary" href="<?php echo create_link(array('m'=>'class', 'a'=>'list.php')); ?>">Cancel</a>
                </div>
                <div class="form-group">
                    <label class="ml-1">Mã Lớp: </label>
                    <input type="text" name="ma" class="form-control" value="<?php echo !empty($data['ma']) ? $data['ma'] : ''; ?>">
                    <?php if (!empty($errors['ma'])) echo $errors['ma']; ?>
                </div>
                <div class="form-group">
                    <label class="ml-1">Tên Lớp: </label>
                    <input type="text" name="ten" class="form-control" value="<?php echo !empty($data['ten']) ? $data['ten'] : ''; ?>">
                    <?php if (!empty($errors['ten'])) echo $errors['ten']; ?>
                </div>
                <div class="form-group">
                    <label class="ml-1">Phòng học: </label>
                    <select name="phonghoc" class="form-control">
                        <option value="P.101-A2" >P.101-A2</option>
                        <option value="P.102-A2" <?php if (!empty($data['phonghoc']) && $data['phonghoc']=='P.102-A2') echo 'selected'; ?>>P.102-A2</option>
                        <option value="P.202-A2" <?php if (!empty($data['phonghoc']) && $data['phonghoc']=='P.202-A2') echo 'selected'; ?>>P.202-A2</option>
                        <option value="P.203-A2" <?php if (!empty($data['phonghoc']) && $data['phonghoc']=='P.203-A2') echo 'selected'; ?>>P.203-A2</option>
                        <option value="P.301-A2" <?php if (!empty($data['phonghoc']) && $data['phonghoc']=='P.301-A2') echo 'selected'; ?>>P.301-A2</option>
                        <option value="P.303-A2" <?php if (!empty($data['phonghoc']) && $data['phonghoc']=='P.303-A2') echo 'selected'; ?>>P.303-A2</option>
                    </select>
                    <?php if (!empty($errors['phonghoc'])) echo $errors['phonghoc']; ?>
                </div>
            </form>
            <form class="input-group" method="POST" action="<?php echo create_link(array('m'=>'class', 'a'=>'add_studentClass.php', 'idClass'=>$data['id'])); ?>">
                <label class="ml-1">Sinh viên: </label>
                <select name="idStudent" class="form-control ml-1">
                    <?php foreach ($data3 as $value3) { ?>
                        <option value="<?php echo $value3['id']; ?>"><?php echo $value3['ma']; ?>--<?php echo $value3['ten']; ?></option>
                    <?php } ?>   
                </select>
                <div class="input-group-append">
                    <input class="btn btn-success btn-sm" type="submit" name="editStudentClass" value="THÊM"/>
                </div>
            </form>
            <hr>
        </div>
        <!--Phần hiển thị danh sách sinh viên-->
        <h3 class="col-12 text-center">Danh sách sinh viên trong lớp</h3>
        <form class="input-group mb-3 col-md-9 col-lg-9" method="POST" action="<?php echo create_link(array('m'=>'class', 'a'=>'edit.php', 'id'=>$data['id'])); ?>">
            <label class="mr-1"><strong>Tìm kiếm thêm sinh viên:</strong></label> 
            <div class="input-group-prepend">
                <select name="control" class="form-control">
                    <option value="ma">Mã SV</option>
                    <option value="gioitinh" <?php if (!empty($dieuKien) && $dieuKien=='gioitinh') echo 'selected'; ?>>Giới tính</option>
                </select>
            </div>
            <input type="text" name="keyword" class="form-control" placeholder="Tìm kiếm thêm sinh viên chưa có lớp theo mã sv hoặc giới tính..." value="<?php echo (!empty($_POST['keyword'])) ? $_POST['keyword'] : ''; ?>">
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
                        <td><?php echo $value2['ma']; ?></td>
                        <td><?php echo $value2['ten']; ?></td>
                        <td><?php echo $value2['gioitinh']; ?></td>
                        <td><?php echo date("d/m/Y", strtotime($value2['ngaysinh'])); ?></td>
                        <td>
                            <form method="POST" action="<?php echo create_link(array('m'=>'class', 'a'=>'delete_studentClass.php')); ?>">
                                <input type="hidden" name="idStudent" value="<?php echo $value2['id']; ?>"/>
                                <input type="hidden" name="idClass" value="<?php echo $data['id']; ?>"/>
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