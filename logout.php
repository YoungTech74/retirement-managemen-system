<?php
    include_once './admin/includes/connection.php';
// if(isset($_SESSION['userid'])){
    // unset($_SESSION['userid']);
    session_destroy();

    header('location: ./index.php');
    
// }