<?php
if(!empty($_POST["control"]) && !empty($_POST["keyword"])){
	$dieuKien = $_POST["control"];
	$noiDung = $_POST["keyword"];
	$data = get_by_search("sinhvien", $dieuKien, $noiDung);
}
else{
	$data = get_all("sinhvien");
}
disconnect_db();
?>
