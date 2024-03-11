<?php
    include_once './includes/connection.php';
    if(!isset($_SESSION['admin_id'])){
        header('location: ../index.php');
    }
    
    $emp_id = $_GET['emp_id'];

    $deletUser = mysqli_query($conn, "DELETE FROM employees WHERE id = '$emp_id'") or die(mysqli_error($conn));
    if($deletUser){
       $message = true;
    }

    if(isset($message)){
        $_SESSION['message'] = '<div class="alert alert-success alert-dismissible fade show text-white" style="background: green;">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Employee Deleted Successfully.
        </div>';
        header('location: ./employees.php');
        exit();
    }
?>