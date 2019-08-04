<?php
	// Thực hiện xóa
$id = isset($_POST["id"]) ? (int)$_POST["id"] : "";
if ($id){
	delete("lophoc", "id", $id);
	?>
	<script>
		alert("Xóa lớp học thành công");
		window.location = "<?php echo create_link(array('c'=>'class', 'a'=>'list')); ?>";
	</script>
	<?php
}

?>