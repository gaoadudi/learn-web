<?php
$idClass = isset($_GET["idClass"]) ? (int)$_GET["idClass"] : "";
$idStudent = isset($_POST["idStudent"]) ? (int)$_POST["idStudent"] : "";
if($idStudent==""){
	?>
	<script>
				//Thêm sinh viên vào lớp thành công
				window.location = "<?php echo create_link(array('c'=>'class', 'a'=>'edit', 'id'=>$idClass)); ?>";
			</script>
			<?php
		}
		if ($idClass && $idStudent){
		// Thêm sinh viên vào lớp
			update("sinhvien", array('idlop'=>$idClass), "id", $idStudent);
			?>
			<script>
				alert("Thêm sinh viên vào lớp thành công");
				window.location = "<?php echo create_link(array('c'=>'class', 'a'=>'edit', 'id'=>$idClass)); ?>";
			</script>
			<?php

		}
		?>
		