<?php
	// Thực hiện xóa
	$idClass = isset($_GET["idClass"]) ? (int)$_GET["idClass"] : "";
	$idStudent = isset($_POST["idStudent"]) ? (int)$_POST["idStudent"] : "";
	if ($idClass && $idStudent){
		update("sinhvien", array('idlop'=>$idClass), "id", $idStudent);
	    ?>
	    <script>
	    	alert("Thêm sinh viên vào lớp thành công");
	    	window.location = "<?php echo create_link(array('m'=>'class', 'a'=>'edit.php', 'id'=>$idClass)); ?>";
	    </script>
	    <?php
	}
?>