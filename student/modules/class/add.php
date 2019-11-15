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
                window.location = "<?php echo create_link(array('m'=>'class', 'a'=>'list.php')); ?>";
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
            <h2 class="text-center">Thêm lớp học</h2>
            <form method="POST" action="<?php echo create_link(array('m'=>'class', 'a'=>'add.php')); ?>">          
                <table class="table mt-2 text-center">
                    <tr>
                        <td colspan="2">
                            <input class="btn btn-success mr-3" type="submit" name="add_class" value="Thêm">
                            <input class="btn btn-success mr-3" type="reset" value="Reset">
                            <a class="btn btn-primary" href="<?php echo create_link(array('m'=>'class', 'a'=>'list.php')); ?>">Cancel</a>
                        </td> 
                    </tr>
                    <tr>
                        <td><label class="ml-1">Mã Lớp: </label></td>
                        <td>
                            <input type="text" name="ma" class="form-control" value="<?php echo !empty($data['ma']) ? $data['ma'] : ''; ?>">
                            <?php if (!empty($errors['ma'])) echo $errors['ma']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td><label class="ml-1">Tên Lớp: </label></td>
                        <td>
                            <input type="text" name="ten" class="form-control" value="<?php echo !empty($data['ten']) ? $data['ten'] : ''; ?>">
                            <?php if (!empty($errors['ten'])) echo $errors['ten']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td><label class="ml-1">Phòng học: </label></td>
                        <td>
                            <select name="phonghoc" class="form-control">
                                <option value="P.101-A2" >P.101-A2</option>
                                <option value="P.102-A2" <?php if (!empty($data['phonghoc']) && $data['phonghoc']=='P.102-A2') echo 'selected'; ?>>P.102-A2</option>
                                <option value="P.202-A2" <?php if (!empty($data['phonghoc']) && $data['phonghoc']=='P.202-A2') echo 'selected'; ?>>P.202-A2</option>
                                <option value="P.203-A2" <?php if (!empty($data['phonghoc']) && $data['phonghoc']=='P.203-A2') echo 'selected'; ?>>P.203-A2</option>
                                <option value="P.301-A2" <?php if (!empty($data['phonghoc']) && $data['phonghoc']=='P.301-A2') echo 'selected'; ?>>P.301-A2</option>
                                <option value="P.303-A2" <?php if (!empty($data['phonghoc']) && $data['phonghoc']=='P.303-A2') echo 'selected'; ?>>P.303-A2</option>
                            </select>
                            <?php if (!empty($errors['phonghoc'])) echo $errors['phonghoc']; ?>
                        </td>
                    </tr>
                </table>
            </form>
            <hr>
        </div>
    </div>
</div>
<?php
    include "layout/footer.php";
?>