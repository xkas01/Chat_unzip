<?php
session_start();
include_once "config.php";
$outgoing_id = $_SESSION['unique_id'];
$query = "select * from users where not unique_id={$outgoing_id}";
$sql = mysqli_query($conn, $query);
$output = "";

if (mysqli_num_rows($sql) == 1) {
    $output .= "No users are available to chat";
} elseif (mysqli_num_rows($sql) > 0) {
    include "data.php";
}
echo $output;