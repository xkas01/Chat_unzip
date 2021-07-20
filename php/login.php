<?php

include_once "config.php";
/**@var $conn */
session_start();
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

if (!empty($email) && !empty($password)) {
    $query = "select * from users where email='{$email}' AND password='{$password}'";
    $sql = mysqli_query($conn, $query);
    if (mysqli_num_rows($sql) > 0) {
        $row = mysqli_fetch_assoc($sql);
        $status = "Online";
        $query2 = "update users set status='{$status}' where unique_id={$row['unique_id']}";
        $sql2=mysqli_query($conn,$query2);
        if ($sql2){
            $_SESSION['unique_id'] = $row['unique_id'];
            echo "success";
        }
    } else {
        echo "Email or Password is incorrect!";
    }
} else {
    echo "All input fields are required";
}