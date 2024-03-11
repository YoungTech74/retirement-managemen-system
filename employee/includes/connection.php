<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'retirement_db');
if(!$conn){
    die(mysqli_error($conn));
}

// retirement_db 