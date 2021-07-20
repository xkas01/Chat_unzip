<?php
/**@var $conn */
session_start();
if (isset($_SESSION['unique_id'])) {
    include_once "config.php";
    $outgoing_id = mysqli_real_escape_string($conn, $_POST['outgoing_id']);
    $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    if (!empty($message)) {
        $query = "insert into messages (incoming_msg_id, outgoing_msg_id, msg) 
                values ({$incoming_id},{$outgoing_id},'{$message}')";
        $sql = mysqli_query($conn, $query) or die(mysqli_error($conn));
    }
} else {
    header("../login.php");
}