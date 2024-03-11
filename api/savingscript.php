<?php

$conn = mysqli_connect('localhost', 'root', '', 'retirement_db');
if(!$conn){
    die(mysqli_error($conn));
}

mysqli_query($conn, "UPDATE saving_plan SET month_count = month_count + 1, savings_amt  = savings_amt + ((15 * salary) / 100)");

?>