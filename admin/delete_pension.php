<?php
    include_once './includes/connection.php';
    if(!isset($_SESSION['admin_id'])){
        header('location: ../index.php');
    }
    
    $pen_id = $_GET['pension_id'];

    $deletUser = mysqli_query($conn, "DELETE FROM pension_list WHERE id = '$pen_id'") or die(mysqli_error($conn));
    if($deletUser){
        $message = true;
    }

    if(isset($message)){
        $_SESSION['message'] = '<div class="alert alert-success alert-dismissible fade show text-white" style="background: green;">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            User Deleted Successfully.
        </div>';
        header('location: ./pensioners_list.php');
        exit();
    }
?>