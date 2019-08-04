<?php
    // Biến kết nối toàn cục
    global $conn;
     
    // Hàm kết nối database
    function connect_db(){
        // Gọi tới biến toàn cục $conn
        global $conn;
         
        // Nếu chưa kết nối thì thực hiện kết nối
        if (!$conn){
            $conn = mysqli_connect('localhost', 'root', '', 'mvc1') or die ("Can't connect to database");
            // Thiết lập font chữ kết nối
            mysqli_set_charset($conn, 'utf8');
        }
    }
     
    // Hàm ngắt kết nối
    function disconnect_db(){
        global $conn;
         
        // Nếu đã kêt nối thì thực hiện ngắt kết nối
        if ($conn){
            mysqli_close($conn);
        }
    }
     
    // Hàm lấy tất cả sinh viên
    function get_all($table){
        // Gọi tới biến toàn cục $conn
        global $conn;
        // Hàm kết nối
        connect_db();
         
        // Câu truy vấn lấy tất cả record
        $sql = "SELECT * FROM {$table}";
         
        // Thực hiện câu truy vấn
        $query = mysqli_query($conn, $sql);
         
        // Mảng chứa kết quả
        $result = array();
         
        // Lặp qua từng record và đưa vào biến kết quả
        if ($query){
            while ($row = mysqli_fetch_assoc($query)){
                $result[] = $row;
            }
        }
         
        // Trả kết quả về
        return $result;
    }
     
    // Hàm lấy theo value
    function get_by_value($table, $key, $value){
        // Gọi tới biến toàn cục $conn
        global $conn;
        // Hàm kết nối
        connect_db();
         
        // Câu truy vấn lấy tất cả record
        $sql = "SELECT * FROM {$table} WHERE {$key} = '{$value}'";
         
        // Thực hiện câu truy vấn
        $query = mysqli_query($conn, $sql);
         
        // Mảng chứa kết quả
        $result = array();
         
        // Nếu có kết quả và đưa vào biến kết quả
        if (mysqli_num_rows($query) > 0){
            $result = mysqli_fetch_assoc($query);
        }
         
        // Trả kết quả về
        return $result;
    }

    // Hàm lấy theo nội dung tìm kiếm
    function get_by_search($table, $key, $value){
        // Gọi tới biến toàn cục
        global $conn;
        // Hàm kết nối
        connect_db();
         
        // Câu truy vấn lấy tất cả record
        $sql = "SELECT * FROM {$table} WHERE {$key} LIKE '%{$value}%'";
         
        // Thực hiện câu truy vấn
        $query = mysqli_query($conn, $sql);
         
        // Mảng chứa kết quả
        $result = array();
         
        // Lặp qua từng record và đưa vào biến kết quả
        if ($query){
            while ($row = mysqli_fetch_assoc($query)){
                $result[] = $row;
            }
        }
         
        // Trả kết quả về
        return $result;
    }

    // Hàm thực thi các câu truy vấn khác
    function get_execute($sql){
        // Gọi tới biến toàn cục
        global $conn;
        // Hàm kết nối
        connect_db();
         
        // Thực hiện câu truy vấn
        $query = mysqli_query($conn, $sql);
         
        // Mảng chứa kết quả
        $result = array();
         
        // Lặp qua từng record và đưa vào biến kết quả
        if ($query){
            while ($row = mysqli_fetch_assoc($query)){
                $result[] = $row;
            }
        }
         
        // Trả kết quả về
        return $result;
    }
     
    // Hàm thêm 
    function insert($table, $data=array()){
        // Gọi tới biến toàn cục
        global $conn;
        // Hàm kết nối
        connect_db();
         
        $fields = "";
        $values = "";
        // Mảng dữ liệu insert
        foreach ($data as $field => $value){
            $fields .= $field.",";
            // Chống SQL Injection
            $values .= "'".addslashes($value)."',";
        }
        // Xóa ký từ , ở cuối chuỗi
        $fields = trim($fields, ",");
        $values = trim($values, ",");

        // Câu truy vấn thêm
        $sql = "INSERT INTO {$table} ($fields) VALUES ({$values});";
         
        // Thực hiện câu truy vấn
        $query = mysqli_query($conn, $sql);
        
        // Trả kết quả về 
        return $query;
    }
     
    // Hàm sửa 
    function update($table, $data=array(), $key, $value){
        global $conn;
        connect_db();

        // Tạo câu truy vẫn sửa
        $sql = "UPDATE {$table} SET ";

        // Mảng dữ liệu update
        foreach ($data as $field => $val){
            if($val!='null'){
                $sql .= $field."='".addslashes($val)."', ";    
            }
            else{
                $sql .= $field."=".addslashes($val).", ";
            }
        }

        // Xóa ký từ , ở cuối chuỗi
        $sql = trim($sql, " ");
        $sql = trim($sql, ",");

        // Điều kiện where               
        $where = " WHERE {$key} = '{$value}';";
        $sql .= "{$where}";
                
        // Thực hiện câu truy vấn
        $query = mysqli_query($conn, $sql);
         
        // Trả kết quả về 
        return $query;
    }
    
    // Hàm xóa 
    function delete($table, $key, $value){
        // Gọi tới biến toàn cục
        global $conn;
        // Hàm kết nối
        connect_db();
         
        // Câu truy sửa
        $sql = "DELETE FROM {$table}
                WHERE {$key} = '{$value}'";
         
        // Thực hiện câu truy vấn
        $query = mysqli_query($conn, $sql);
         
        // Trả kết quả về
        return $query;
    }
?>