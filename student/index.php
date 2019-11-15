<?php
	// Lấy module và action trên URL
	$module = isset($_GET["m"]) ? $_GET["m"] : "";
	$action = isset($_GET["a"]) ? $_GET["a"] : "";

	// Đường đẫn mặc định
	if (empty($module) || empty($action)){
		$module = "student";
		$action = "list.php";
	}

	// Tạo đường dẫn và lưu vào biến $path
	$path = "modules/".$module."/".$action;

	// Trường hợp URL chạy đúng
	if (file_exists($path)){
		include_once ("libs/database.php");
		include_once ("libs/helper.php");
		include_once ($path);
	} 
	else{
	    // Trường hợp URL không tồn tại
		include_once ("modules/common/404.php");
	}
?>