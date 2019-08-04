<?php
	// Hàm tạo URL
	function base_url($url){
	    return "http://localhost/mvc1/".$url;
	}
	 
	// Hàm chuyển hướng đến URL
	function redirect($url){
	    header("Location:{$url}");
	    exit();
	}

	// Hàm tạo chuỗi query string
	function create_link($filter=array()){
		$string = "";
		foreach ($filter as $key => $value){
			if ($value != ""){
				$string .= "&{$key}={$value}";
			}
		}
		// Bỏ đi ký tự & ở đầu
		$string = "?".ltrim($string, "&");
		return "http://localhost/mvc1/index.php".$string;
	}
?>