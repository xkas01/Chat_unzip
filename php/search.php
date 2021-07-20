<?php
session_start();
include_once "config.php";
$outgoing_id = $_SESSION['unique_id'];
$searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);
$output = "";
$query = "select * from users where not and (unique_id={$outgoing_id} fname like '%{$searchTerm}%' or lname like '%{$searchTerm}%')";
$sql = mysqli_query($conn, $query);
if (mysqli_num_rows($sql) > 0) {
    include "data.php";
} else {
    $output .= "No user found related to your search term";
}
echo $output;