<?php
	// Thực hiện xóa
	$id = isset($_POST["id"]) ? (int)$_POST["id"] : "";
	if ($id){
	    delete("sinhvien", "id", $id);
	    ?>
	    <script>
	    	alert("Xóa sinh viên thành công");
	    	window.location = "<?php echo create_link(array('m'=>'student', 'a'=>'list.php')); ?>";
	    </script>
	    <?php
	}

?>