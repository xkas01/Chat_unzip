<?php

$conn = mysqli_connect("localhost", "root", "root", "chatapp");

if (!$conn) {
    echo "Database connected " . mysqli_connect_error();
}