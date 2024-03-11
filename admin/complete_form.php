<?php
    include_once './includes/connection.php'; 
    include_once './includes/header.php'; 
    include_once './includes/preloader.php'; 
    include_once './includes/navbar.php'; 
    include_once './includes/sidebar.php'; 

    if(!isset($_SESSION['admin_id'])){
        header('location: ../index.php');
    }

$notMatchPasswordError = "";
$message = "";


if (isset($_POST['employee_btn'])) {

    $next_kin_full_name = mysqli_real_escape_string($conn, $_POST['next_kin_fullname']);
    $relationship = mysqli_real_escape_string($conn, $_POST['relationship']);
    $next_kin_dob = mysqli_real_escape_string($conn, $_POST['next_of_kin_dob']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);

    $firstname = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
    $phone = $_SESSION['phone']; 
    $email = $_SESSION['email'];
    $dob = $_SESSION['dob'];            
    $address = $_SESSION['address'];
    $position = $_SESSION['position'];
    $salary = $_SESSION['salary'];
    $hash_password = $_SESSION['hash_password'];
    $gender = $_SESSION['gender'];
    $filename = $_SESSION['image'];


        $count = 0;
        $count2 = 0;

        // $checkExistUser = mysqli_query($conn, "SELECT * FROM employees WHERE first_name = '$firstname' && last_name = '$last_name' && dob = '$dob'  && 
        // phone = '$phone'  && address = '$address'  && position = '$position'  && gender = '$gender'");

        $checkExistUser = mysqli_query($conn, "SELECT * FROM next_of_kin WHERE emp_email = '$email' && full_name = '$next_kin_full_name' && dob = '$next_kin_dob' && relationship = '$relationship' && phone = '$phone';");

        $count = mysqli_num_rows($checkExistUser);
        
        if($count > 0){
            $message = '<div class="alert alert-danger alert-dismissible fade show text-white" style="background: green;">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                Next of Kin with These Details Already Exit!
          </div>';
          ?>
             <script>
                 setTimeout(() => {
                     document.getElementById('getMessage').style.display = 'none';
                     window.location = './complete_form.php';
                 }, 3000);
             </script>
          <?php
       
          
        }else {
            
            $today = date("Y-m-d");
            $inserNewUser = mysqli_query($conn, "INSERT INTO employees VALUES(0, '$firstname', '$last_name', '$phone', '$email', '$dob', '$address', '$position', '$salary', '$hash_password', '$gender', '$filename', 'employee', 'Active', 'No', '$today' );") or die(mysqli_error($conn));
            if($inserNewUser){
                $insertNextOfKin = mysqli_query($conn, "INSERT INTO next_of_kin VALUES(0, '$email', '$next_kin_full_name', '$next_kin_dob', '$relationship', '$phone', current_timestamp() )");
                $message = '<div class="alert alert-success alert-dismissible fade show text-white" style="background: green;">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                Employee Added Successfully.
              </div>';
              ?>
                 <script>
                     setTimeout(() => {
                         document.getElementById('getMessage').style.display = 'none';
                         window.location = './add_new_employee.php';
                     }, 2000);
                 </script>
              <?php

            }
        }
    }
  




?>
<head>
    <title>Next of Kin</title>
</head>
    <div class="page-wrapper">

        <div class="container-fluid"><br>
        <span id="getMessage"><?php echo $message; ?></span>
                <!-- Start Page Content -->
    <div class="col-lg-12">
    <div class="card card-outline-primary">
        <div class="card-header">
            <h4 class="m-b-0 text-white">Next of Kin Details</h4>
            <p id="demo"></p>
        </div>
        <div class="card-body">

        <form action='' method='POST'>
                <div class="form-body">
                    
                    <hr>
                    <div class="row p-t-20">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Next of Kin Full Name</label>
                                <input type="text" name="next_kin_fullname" class="form-control"  required>
                            </div>
                        </div>
                    
                       

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Next of Kin Date of Birth</label>
                                <input type="text" name="next_of_kin_dob" class="form-control"  required pattern="\d{4}-\d{2}-\d{2}" placeholder="yyyy-mm-dd">
                            </div>
                        </div>
                    
                    </div>
                
                    <div class="row p-t-20">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Relationship </label>
                                <input type="text" name="relationship" class="form-control" required>
                            </div>
                        </div>
                
                        <div class="col-md-6">
                            <div class="form-group has-danger">
                                <label class="control-label">Phone Number</label>
                                <input type="text" name="phone" class="form-control form-control-danger"  required>
                            </div>
                        </div>

                    </div>
      
            
                <div class="form-actions">
                    <button type="submit" name="employee_btn" id="form_sub" class="btn btn-primary"> Submit</button>
                    <!-- <a href="add_new_employee.php" class="btn btn-warning">Back</a> -->
                    <a href="dashboard.php" class="btn btn-inverse">Cancel</a>
                </div>
            </form>
        </div>
        
    </div>
    </div>

    <footer class="footer"> © 2023 - Job Retirement System All Right Reserved <span class="float-right">Version 1.0.0</span></footer>

    <?php include_once './includes/js_libraries.php';?>

</body>

</html>