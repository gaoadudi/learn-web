<?php
	// Thực hiện xóa
	$idClass = isset($_POST["idClass"]) ? (int)$_POST["idClass"] : "";
	$idStudent = isset($_POST["idStudent"]) ? (int)$_POST["idStudent"] : "";
	if ($idClass && $idStudent){
		update("sinhvien", array('idlop'=>'null'), "id", $idStudent);
	    ?>
	    <script>
	    	alert("Xóa sinh viên khỏi lớp thành công");
	    	window.location = "<?php echo create_link(array('m'=>'class', 'a'=>'edit.php', 'id'=>$idClass)); ?>";
	    </script>
	    <?php
	}
?>