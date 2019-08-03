<?php
	function validate_student($data){
		$error = array();
		/* VALIDATE CĂN BẢN */
    	// Mã
		if (isset($data["ma"]) && $data["ma"] == ""){
			$error["ma"] = "Bạn chưa nhập mã sv";
		}
    	// Tên
		if (isset($data["ten"]) && $data["ten"] == ""){
			$error["ten"] = "Bạn chưa nhập tên sv";
		}
    	// Giới tính
		if (isset($data["gioitinh"]) && $data["gioitinh"] == ""){
			$error["gioitinh"] = "Bạn chưa nhập giới tính";
		}
		// Ngày sinh
		$today = date("Y-m-d");  
		$birth = $data["ngaysinh"]; 
		if (strtotime($birth) >= strtotime($today)) {
			$error["ngaysinh"] = "Ngày sinh không hợp lệ";
		}
		/* VALIDATE LIÊN QUAN CSDL */
    	// Mã
    	// Nếu là truy vấn sửa (bỏ qua id hiện tại)
		if (!($error) && isset($data["ma"]) && $data["ma"] && isset($data["id"]) && $data["id"]){
	        // Câu truy vấn lấy tất cả sinh viên có mã bị trùng
	        if(isset($data["id"]) && $data["id"]){
	        	// Nếu là truy vấn sửa (bỏ qua id hiện tại)
	        	$sql = "SELECT ma FROM sinhvien WHERE ma='{$data['ma']}' AND id!='{$data['id']}'";
	        }
	        else{
	        	$sql = "SELECT ma FROM sinhvien WHERE ma='{$data['ma']}'"; 
	        }
	         
	        $result = get_execute($sql);
	         
	        // Nếu có kết quả 
	        if (count($result) > 0){
	            $error["ma"] = "Mã sinh viên này đã tồn tại";
	        }
		}
	    return $error;
	}

	function validate_class($data){
		$error = array();
		// Mã
		if (isset($data["ma"]) && $data["ma"] == ""){
			$error["ma"] = "Bạn chưa nhập mã lớp";
		}
    	// Phòng học
		if (isset($data["phonghoc"]) && $data["phonghoc"] == ""){
			$error["phonghoc"] = "Bạn chưa nhập phòng học";
		}
		// Tên
		if (isset($data["ten"]) && $data["ten"] == ""){
			$error["ten"] = "Bạn chưa nhập tên lớp";
		}
		/* VALIDATE LIÊN QUAN CSDL */
    	// Mã
    	// Nếu là truy vấn sửa (bỏ qua id hiện tại)
		if (!($error) && isset($data["ma"]) && $data["ma"]){
	        // Câu truy vấn lấy tất cả lớp có mã bị trùng
	        if(isset($data["id"]) && $data["id"]){
	        	// Nếu là truy vấn sửa (bỏ qua id hiện tại)
	        	$sql = "SELECT ma FROM lophoc WHERE ma='{$data['ma']}' AND id!='{$data['id']}'";
	        }
	        else{
	        	$sql = "SELECT ma FROM lophoc WHERE ma='{$data['ma']}'"; 
	        }
	             
	        $result = get_execute($sql);
	         
	        // Nếu có kết quả 
	        if (count($result) > 0){
	            $error["ma"] = "Mã lớp này đã tồn tại";
	        }
		} 
	}
?> 