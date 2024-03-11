
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
    
$message = "";
$id = "";

if (isset($_POST['savings_plan_btn'])) {

    $fullname = mysqli_real_escape_string($conn, $_POST['next_of_kin_fullname']);
    $next_of_kin_dob = mysqli_real_escape_string($conn, $_POST['next_of_kin_dob']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $relationship = mysqli_real_escape_string($conn, $_POST['relationship']);
    

        $count = 0;

        $checkExistUser = mysqli_query($conn, "SELECT * FROM employees");
        while($row = mysqli_fetch_assoc($checkExistUser)){
            $id = $row['id'];
            $first_name = $row['first_name'];
            $last_name = $row['last_name'];
            $salary = $row['salary'];
        }

        $checkExistUser = mysqli_query($conn, "SELECT * FROM saving_plan WHERE emp_email = '$email'");

        if(mysqli_num_rows($checkExistUser) > 0){
            $message = '<div class="alert alert-danger alert-dismissible fade show text-white" style="background: green;">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            You have already Joined Savings Plan Association. Thank You!
          </div>';
          ?>
             <script>
                 setTimeout(() => {
                     document.getElementById('getMessage').style.display = 'none';
                     window.location = './savings_plan.e.php';
                 }, 5000);
             </script>
          <?php
        }else {

        $getInfo = mysqli_query($conn, "INSERT INTO saving_plan (emp_id, emp_first_name, emp_last_name, emp_email, next_of_kin_fullname, next_of_kin_dob, relationship, next_of_kin_phone, salary, savings_amt, status, date_created) 
                SELECT id, first_name, last_name, email, '$fullname', '$next_of_kin_dob', '$relationship', '$phone', salary, ((15 * salary) / 100), 1, current_timestamp() FROM employees WHERE  email = '$email'");
       
            if($getInfo){
                $message = '<div class="alert alert-success alert-dismissible fade show text-white" style="background: green;">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    Your record has been submitted successfully. Your savings plan percentage will start from you next salary. Thank You!
              </div>';
             
            }else  {
                $message = '<div class="alert alert-danger alert-dismissible fade show text-white" style="background: green;">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    Please enter a valid registered Email. Thank You!
              </div>';
            }
        }
            

    }
  




?>

<head>
    <title>Savings Plan</title>
</head>
    <div class="page-wrapper">

        <div class="container-fluid"><br>
            <span id="getMessage"><?php echo $message; ?></span>
                <!-- Start Page Content -->
    <div class="col-lg-12">
    <div class="card card-outline-primary">
        <div class="card-header">
            <h4 class="m-b-0 text-white">Fill In The Form Below</h4>
            <p id="demo"></p>
        </div>
        <div class="card-body">

            <form action='' method='POST'  enctype="multipart/form-data" id="form_sub" name='reg'>
                <div class="form-body">
                    
                    <hr>
                    <div class="row p-t-20">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Next of Kin Full Name</label>
                                <input type="text" name="next_of_kin_fullname" class="form-control"  required>
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
      
                    <div class="col-md-6">
                            <div class="form-group has-danger">
                                <label class="control-label">Employee Email</label>
                                <input type="text" name="email" class="form-control form-control-danger"  required>
                            </div>
                        </div>
             
                <div class="form-actions">
                    <button type="submit" name="savings_plan_btn" id="form_sub" class="btn btn-primary"> Submit</button>
                    <a href="dashboard.php" class="btn btn-inverse">Cancel</a>
                </div>
            </form>
        </div>
        
    </div>
    </div>
   
    <?php include_once './includes/js_libraries.php';?>


</body>

</html>