<?php
    if(!empty($_POST["control"]) && !empty($_POST["keyword"])){
    	$dieuKien = $_POST["control"];
    	$noiDung = $_POST["keyword"];
    	$data = get_by_search("students", $dieuKien, $noiDung);
    }
    else{
    	$data = get_all("students");
    }
    disconnect_db();
?>
