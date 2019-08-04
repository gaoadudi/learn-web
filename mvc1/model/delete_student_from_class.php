<?php
$idClass = isset($_GET["idClass"]) ? (int)$_GET["idClass"] : "";
$idStudent = isset($_POST["idStudent"]) ? (int)$_POST["idStudent"] : "";
if ($idClass && $idStudent){
    	// Xóa sinh viên khỏi lớp
	update("sinhvien", array('idlop'=>'null'), "id", $idStudent);
	?>
	<script>
		alert("Xóa sinh viên khỏi lớp thành công");
		window.location = "<?php echo create_link(array('c'=>'class', 'a'=>'edit', 'id'=>$idClass)); ?>";
	</script>
	<?php
}
?>