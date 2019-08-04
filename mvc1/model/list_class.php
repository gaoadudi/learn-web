<?php
if(!empty($_POST["control"]) && !empty($_POST["keyword"])){
	$dieuKien = $_POST["control"];
	$noiDung = $_POST["keyword"];
	$data = get_by_search("lophoc", $dieuKien, $noiDung);
}
else{
	$data = get_all("lophoc");
}
disconnect_db();
?>