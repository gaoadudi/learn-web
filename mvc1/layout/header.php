<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./style/style.css">
    <link rel="stylesheet" type="text/css" href="./style/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="./style/fontawesome/css/all.css">  
    <script src="./style/jquery-3.3.1.min.js"></script>
    <script src="./style/bootstrap/popper.min.js"></script>
    <script src="./style/bootstrap/js/bootstrap.min.js"></script>
    <title>Classes</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Trang chủ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo create_link(array('c'=>'student', 'a'=>'list')); ?>">Sinh viên</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo create_link(array('c'=>'class', 'a'=>'list')); ?>">Lớp học</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <h4>Chào mừng tới trang quản trị</h4>
            </form>
        </div>
    </nav>