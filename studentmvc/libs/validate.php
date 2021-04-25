<?php
	function validate_student($data){
		$error = array();
		/* VALIDATE CĂN BẢN */
    	// Mã
		if (isset($data["code"]) && $data["code"] == ""){
			$error["code"] = "Bạn chưa nhập mã sv";
		}
    	// Tên
		if (isset($data["name"]) && $data["name"] == ""){
			$error["name"] = "Bạn chưa nhập tên sv";
		}
    	// Giới tính
		if (isset($data["gender"]) && $data["gender"] == ""){
			$error["gender"] = "Bạn chưa nhập giới tính";
		}
		// Ngày sinh
		$today = date("Y-m-d");  
		$birth = $data["birth"]; 
		if (strtotime($birth) >= strtotime($today)) {
			$error["birth"] = "Ngày sinh không hợp lệ";
		}
		/* VALIDATE LIÊN QUAN CSDL */
    	// Mã
    	// Nếu là truy vấn sửa (bỏ qua id hiện tại)
		if (!($error) && isset($data["code"]) && $data["code"] && isset($data["id"]) && $data["id"]){
	        // Câu truy vấn lấy tất cả sinh viên có mã bị trùng
	        if(isset($data["id"]) && $data["id"]){
	        	// Nếu là truy vấn sửa (bỏ qua id hiện tại)
	        	$sql = "SELECT code FROM students WHERE code='{$data['code']}' AND id!='{$data['id']}'";
	        }
	        else{
	        	$sql = "SELECT code FROM students WHERE code='{$data['code']}'"; 
	        }
	         
	        $result = get_execute($sql);
	         
	        // Nếu có kết quả 
	        if (count($result) > 0){
	            $error["code"] = "Mã sinh viên này đã tồn tại";
	        }
		}
	    return $error;
	}

	function validate_class($data){
		$error = array();
		// Mã
		if (isset($data["code"]) && $data["code"] == ""){
			$error["ma"] = "Bạn chưa nhập mã lớp";
		}
    	// Phòng học
		if (isset($data["room"]) && $data["room"] == ""){
			$error["room"] = "Bạn chưa nhập phòng học";
		}
		// Tên
		if (isset($data["name"]) && $data["name"] == ""){
			$error["name"] = "Bạn chưa nhập tên lớp";
		}
		/* VALIDATE LIÊN QUAN CSDL */
    	// Mã
    	// Nếu là truy vấn sửa (bỏ qua id hiện tại)
		if (!($error) && isset($data["code"]) && $data["code"]){
	        // Câu truy vấn lấy tất cả lớp có mã bị trùng
	        if(isset($data["id"]) && $data["id"]){
	        	// Nếu là truy vấn sửa (bỏ qua id hiện tại)
	        	$sql = "SELECT code FROM classes WHERE code='{$data['code']}' AND id!='{$data['id']}'";
	        }
	        else{
	        	$sql = "SELECT code FROM classes WHERE code='{$data['code']}'"; 
	        }
	             
	        $result = get_execute($sql);
	         
	        // Nếu có kết quả 
	        if (count($result) > 0){
	            $error["code"] = "Mã lớp này đã tồn tại";
	        }
		} 
	}
?> 