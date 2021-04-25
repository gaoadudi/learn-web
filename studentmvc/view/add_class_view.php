<?php
    include "layout/header.php";
?>
<div class="container">
    <div class="row mt-3 justify-content-center">
        <div class="col-md-5">
            <h2 class="text-center">Thêm lớp học</h2>
            <form method="POST" action="<?php echo create_link(array('c'=>'class', 'a'=>'add')); ?>">          
                <table class="table mt-2 text-center">
                    <tr>
                        <td colspan="2">
                            <input class="btn btn-success mr-3" type="submit" name="add_class" value="Thêm">
                            <input class="btn btn-success mr-3" type="reset" value="Reset">
                            <a class="btn btn-primary" href="<?php echo create_link(array('c'=>'class', 'a'=>'list')); ?>">Cancel</a>
                        </td> 
                    </tr>
                    <tr>
                        <td><label class="ml-1">Mã Lớp: </label></td>
                        <td>
                            <input type="text" name="code" class="form-control" value="<?php echo !empty($data['code']) ? $data['code'] : ''; ?>">
                            <?php if (!empty($errors['code'])) echo $errors['code']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td><label class="ml-1">Tên Lớp: </label></td>
                        <td>
                            <input type="text" name="name" class="form-control" value="<?php echo !empty($data['name']) ? $data['name'] : ''; ?>">
                            <?php if (!empty($errors['name'])) echo $errors['name']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td><label class="ml-1">Phòng học: </label></td>
                        <td>
                            <select name="room" class="form-control">
                                <option value="P.101-A2" >P.101-A2</option>
                                <option value="P.102-A2" <?php if (!empty($data['room']) && $data['room']=='P.102-A2') echo 'selected'; ?>>P.102-A2</option>
                                <option value="P.202-A2" <?php if (!empty($data['room']) && $data['room']=='P.202-A2') echo 'selected'; ?>>P.202-A2</option>
                                <option value="P.203-A2" <?php if (!empty($data['room']) && $data['room']=='P.203-A2') echo 'selected'; ?>>P.203-A2</option>
                                <option value="P.301-A2" <?php if (!empty($data['room']) && $data['room']=='P.301-A2') echo 'selected'; ?>>P.301-A2</option>
                                <option value="P.303-A2" <?php if (!empty($data['room']) && $data['room']=='P.303-A2') echo 'selected'; ?>>P.303-A2</option>
                            </select>
                            <?php if (!empty($errors['room'])) echo $errors['room']; ?>
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