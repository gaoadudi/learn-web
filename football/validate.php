<?php
    // Validate name
    if (!is_string($data['name']) || strlen($data['name']) < 2 || strlen($data['name']) > 55) {
       $errors['name'] = "Tên cầu thủ không hợp lệ!";
    }
    // Validate age
    if (!is_numeric($data['age']) || $data['age'] < 1 || $data['age'] > 100) {
        $errors['age'] = "Tuổi không hợp lệ!";
    }
    // Validate national
    if (!is_string($data['national']) || strlen($data['national']) < 2 || strlen($data['national']) > 55) {
        $errors['national'] = "Quốc tịch không hợp lệ!";
    }
    // Validate position
    if (!is_string($data['position']) || strlen($data['position']) < 2 || strlen($data['position']) > 10) {
        $errors['position'] = "Vị trí không hợp lệ!";
    }
    // Validate salary
    if (!is_numeric($data['salary']) || $data['salary'] < 1 || $data['salary'] > 1000000) {
        $errors['salary'] = "Lương không hợp lệ!";
    }
?> 