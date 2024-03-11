
<?php 
// header("refresh: 2;");

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


if (isset($_POST['add_emp_btn'])) {

    $firstname = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $position = mysqli_real_escape_string($conn, $_POST['position']);
    $salary = trim(mysqli_real_escape_string($conn, $_POST['salary']));
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);

    $next_kin_full_name = mysqli_real_escape_string($conn, $_POST['nok_name']);
    $relationship = mysqli_real_escape_string($conn, $_POST['relationship']);
    $next_kin_dob = mysqli_real_escape_string($conn, $_POST['nok_dob']);
    $next_of_kin_phone = mysqli_real_escape_string($conn, $_POST['nok_phone']);

    // $firstname = mysqli_real_escape_string($conn, $_POST['first_name']);
    // $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    // $email = mysqli_real_escape_string($conn, $_POST['email']);
    // $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    // $address = mysqli_real_escape_string($conn, $_POST['address']);
    // $dob = mysqli_real_escape_string($conn, $_POST['dob']);
    // $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    // $password = mysqli_real_escape_string($conn, $_POST['password']);


    $hash_password = md5($password);

    //-------------------- insert image --------------------
    $path = '../images/';
    $filename = $path.basename($_FILES['file']['name']);
    move_uploaded_file($_FILES['file']['tmp_name'], $filename);


//------------------------- lines of code to insert admin records---------------------------
    // $inserNewUser = mysqli_query($conn, "INSERT INTO admin VALUES(0, '$firstname', '$last_name', '$email',
    //  '$phone', '$address', '$dob', '$gender', '$hash_password', 'admin', '$filename', current_timestamp());") or die(mysqli_error($conn));
    //  if($inserNewUser){
       
    //  }
// exit();


    if($password !== $confirm_password){
        $notMatchPasswordError = "Passwords do not match!";
    }else {
        $count = 0;

        $checkExistUser = mysqli_query($conn, "SELECT * FROM employees WHERE first_name = '$firstname' && last_name = '$last_name' && dob = '$dob'  && 
        phone = '$phone'  && address = '$address'  && position = '$position'  && gender = '$gender' && nok_name = '$next_kin_full_name' && relationship = '$relationship' 
        && nok_phone = '$next_of_kin_phone' && nok_dob = '$next_kin_dob'");

        $checkEmail = mysqli_query($conn, "SELECT * FROM employees WHERE  email = '$email'");
        while($row = mysqli_fetch_assoc($checkExistUser)){
            $count = mysqli_num_rows($checkExistUser);
        }
        
        if($count > 0){
            $message = '<div class="alert alert-danger alert-dismissible fade show text-white" style="background: green;">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            An Employee with These Details Already Exit!
          </div>';
          ?>
             <script>
                 setTimeout(() => {
                     document.getElementById('getMessage').style.display = 'none';
                     window.location = './add_new_employee.php';
                 }, 3000);
             </script>
          <?php
        }else if(mysqli_num_rows($checkEmail) > 0){
            $message = '<div class="alert alert-danger alert-dismissible fade show text-white" style="background: red;">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            An Employee with This Email Already Exit!
          </div>';
          ?>
             <script>
                 setTimeout(() => {
                     document.getElementById('getMessage').style.display = 'none';
                     window.location = './add_new_employee.php';
                 }, 8000);
             </script>
          <?php
        }else {
            
            $today = date("Y-m-d");
            $inserNewUser = mysqli_query($conn, "INSERT INTO employees VALUES(0, '$firstname', '$last_name', '$phone', '$email', '$dob', '$address', '$position', '$salary', 
            '$next_kin_full_name', '$relationship', '$next_of_kin_phone', '$next_kin_dob', '$hash_password', '$gender',
             '$filename', 'employee', 'Active', 'No', '$today' );") or die(mysqli_error($conn));

            if($inserNewUser){
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
  

} 


?>

<head>
    <title>Add Employee</title>
</head>
    <div class="page-wrapper">

        <div class="container-fluid"><br>
        <span id="getMessage"><?php echo $message; ?></span>
                <!-- Start Page Content -->
    <div class="col-lg-12">
    <div class="card card-outline-primary">
        <div class="card-header">
            <h4 class="m-b-0 text-white">Add Employee</h4>
            <p id="demo"></p>
        </div>
        <div class="card-body">

            <form action='' method='POST'  enctype="multipart/form-data" id="form_sub" name='reg'>
                <div class="form-body">
                    
                    <hr>
                    <div class="row p-t-20">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">First Name</label>
                                <input type="text" name="first_name" class="form-control"  required>
                                </div>
                                
                        </div>
                    
                        <div class="col-md-4">
                            <div class="form-group has-danger">
                                <label class="control-label">Last Name</label>
                                <input type="text" name="last_name" class="form-control form-control-danger"  required>
                                </div>
                                
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Phone Number </label>
                                <input type="text" name="phone" class="form-control" required>
                            </div>
                        </div>
                
                    
                    </div>
      
                    <hr>
                    <div class="row p-t-20">

                    <div class="col-md-4">
                            <div class="form-group has-danger">
                                <label class="control-label">Email Address</label>
                                <input type="email" name="email" class="form-control form-control-danger"  required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Date of Birth</label>
                                <input type="text" name="dob" class="form-control"  required pattern="\d{4}-\d{2}-\d{2}" placeholder="yyyy-mm-dd">
                            </div>
                        </div>
                    
                        <div class="col-md-4">
                            <div class="form-group has-danger">
                                <label class="control-label">Address</label>
                                <input type="text" name="address" class="form-control form-control-danger"  required>
                            </div>
                        </div>
                    
                    </div>

                    <hr>
                    <div class="row p-t-20">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Position</label>
                                <input type="text" name="position" class="form-control"  >
                            </div>
                        </div>
                    
                        <div class="col-md-4">
                            <div class="form-group has-danger">
                                <label class="control-label">Salary</label>
                                <input type="text" name="salary" class="form-control form-control-danger"  autocomplete="off">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Password</label>
                                <input type="password" name="password" class="form-control"  >
                            </div>
                        </div>
                    
                    </div>

 

                    <hr>
                    <div class="row p-t-20">

                    <div class="col-md-4">
                            <div class="form-group has-danger">
                                <label class="control-label">Confirm Password</label>
                                <input type="password" name="confirm_password" class="form-control form-control-danger"  >
                            </div>
                            <small class="text-danger"><?php echo $notMatchPasswordError; ?></small>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Gender</label><br>
                                <!-- <input type="text" name="salary" class="form-control" > -->
                               Male <input type="radio" name="gender" value="Male" required> &nbsp;&nbsp;
                               Female <input type="radio" name="gender" value="Female" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group has-danger">
                                <label class="control-label">Image</label>
                                <input type="file" name="file"  id="lastName" class="form-control form-control-danger" required>
                            </div>
                        </div>
                    
                    </div>


                    <!-------------------------- next of kin section  ------------------------->
                    <hr>
                    <div class="row p-t-20">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Next of kin Fullname</label>
                                <input type="text" name="nok_name" class="form-control"  >
                            </div>
                        </div>
                    
                        <div class="col-md-3">
                            <div class="form-group has-danger">
                                <label class="control-label">Relationship</label>
                                <input type="text" name="relationship" class="form-control form-control-danger"  autocomplete="off">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Next of Kin Phone</label>
                                <input type="text" name="nok_phone" class="form-control"  >
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Next of Kin Dob</label>
                                <input type="text" name="nok_dob" class="form-control"  required pattern="\d{4}-\d{2}-\d{2}" placeholder="yyyy-mm-dd">
                            </div>
                        </div>
                    
                    </div>


                    </div>
                    
                    </div>
                </div>
                <div class="form-actions">
                    <button type="submit" name="add_emp_btn" id="form_sub" class="btn btn-primary">Add</button>
                    <a href="employees.php" class="btn btn-inverse">Cancel</a>
                </div>
            </form>
        </div>
        
    </div>
    </div>

    <footer class="footer"> © 2023 - Job Retirement System All Right Reserved <span class="float-right">Version 1.0.0</span></footer>

    <?php include_once './includes/js_libraries.php';?>

</body>

</html>