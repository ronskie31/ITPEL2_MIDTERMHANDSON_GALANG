<?php
    require_once('connect.php');
    session_start();

    $input = file_get_contents('php://input');
    $data = json_decode($input, true);
    $message = array();

    
    $student_name = $data ['name'];
    $gender = $data ['gender'];
    $email = $data ['email'];
    $address = $data ['address'];
    $contact_num = $data ['contact_num'];
 
    

    //create the sql query
    $query = mysqli_query($con, "insert into customers_tbl(student_name, gender, email, address, contact_no, reg_date) values( '$student_name','$gender', '$email', '$address', '$contact_num', NOW())");
    if($query){
        http_response_code(201);
        $message['status'] = "Success....";
    }else{
        http_response_code(422);
        $message['status'] = 'Error....';
    }

    echo json_encode($message);
    echo mysqli_error($con);
?>s