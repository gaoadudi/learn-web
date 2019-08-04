<?php
	// Lấy module và action trên URL
$controller = isset($_GET["c"]) ? $_GET["c"] : "";
$action = isset($_GET["a"]) ? $_GET["a"] : "";
   // Đường đẫn mặc định
if (empty($controller) || empty($action)){
	$controller = "student";
	$action = "list";
}

if ($controller == "student"){
	switch ($action) {
		case "list":
		include_once ("controller/list_student.php");
		break;
		case "add":
		include_once ("controller/add_student.php");
		break;
		case "edit":
		include_once ("controller/edit_student.php");
		break;
		case "delete":
		include_once ("controller/delete_student.php");
		break;	
		default:
		include_once ("view/404_view.php");
		break;
	}
} 
else if($controller == "class"){
	switch ($action) {
		case "list":
		include_once ("controller/list_class.php");
		break;
		case "add":
		include_once ("controller/add_class.php");
		break;
		case "edit":
		include_once ("controller/edit_class.php");
		break;
		case "delete":
		include_once ("controller/delete_class.php");
		break;	
		case "addStudent":
		include_once ("controller/add_student_into_class.php");
		break;
		case "deleteStudent":
		include_once ("controller/delete_student_from_class.php");
		break;		
	}
}
?>