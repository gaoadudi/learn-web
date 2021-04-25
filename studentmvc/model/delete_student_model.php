<?php
	// Thực hiện xóa
	$id = isset($_POST["id"]) ? (int)$_POST["id"] : "";
	if ($id){
	    delete("students", "id", $id);
	    ?>
	    <script>
	    	alert("Xóa sinh viên thành công");
	    	window.location = "<?php echo create_link(array('c'=>'student', 'a'=>'list')); ?>";
	    </script>
	    <?php
	}

?>