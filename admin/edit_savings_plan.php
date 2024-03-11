
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

$savings_id = $_GET['savings_id'];

    $message = "";
    $emp_first_name = "";
    $emp_last_name = "";
    $next_of_kin_phone = "";
    $next_of_kin_dob = "";
    $next_of_kin_fullname = "";
    $salary = "";
    $savings = "";
    $relationship = "";

   
 $getRecord = mysqli_query($conn, "SELECT * FROM  saving_plan WHERE id = '$savings_id';") or die(mysqli_error($conn));
 while($user = mysqli_fetch_assoc($getRecord)){
    $emp_first_name = $user['emp_first_name'];
    $emp_last_name = $user['emp_last_name'];
    $next_of_kin_phone = $user['next_of_kin_phone'];
    $next_of_kin_fullname = $user['next_of_kin_fullname'];
    $next_of_kin_dob = $user['next_of_kin_dob'];
    $savings = $user['savings_amt'];
    $salary = $user['salary'];
    $relationship = $user['relationship'];
  
 }

if (isset($_POST['update_savings_btn'])) {

    $emp_first_name = mysqli_real_escape_string($conn, $_POST['emp_first_name']);
    $emp_last_name = mysqli_real_escape_string($conn, $_POST['emp_last_name']);
    $next_of_kin_phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $next_of_kin_fullname = mysqli_real_escape_string($conn, $_POST['full_name']);
    $next_of_kin_dob = mysqli_real_escape_string($conn, $_POST['dob']);
    $relationship = mysqli_real_escape_string($conn, $_POST['relationship']);
    $salary = mysqli_real_escape_string($conn, $_POST['salary']);
    $savings = mysqli_real_escape_string($conn, $_POST['savings']);

 
        $updateRecord = mysqli_query($conn, "UPDATE saving_plan SET emp_first_name = '$emp_first_name', emp_last_name = '$emp_last_name', next_of_kin_fullname = '$next_of_kin_fullname', 
        next_of_kin_dob = '$next_of_kin_dob', relationship = '$relationship', 
            next_of_kin_phone = '$next_of_kin_phone', salary = '$salary', savings_amt = '$savings'  WHERE id ='$savings_id'") or die(mysqli_error($conn));
        if ($updateRecord) {
           $message = '<div class="alert alert-success alert-dismissible fade show text-white" style="background: green;">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            User Updated Successfully.
            </div>';?>
                <script>
                    setTimeout(() => {
                        window.location = './savings_plan.php'
                    }, 3000);
                </script>
            <?php
        }
    }


?>
<head>
    <title>Update User</title>
</head>
    <div class="page-wrapper">

        <div class="container-fluid">
                <!-- Start Page Content -->
    <div class="col-lg-12"><br>
    <span><?php echo $message; ?></span>
    <div class="card card-outline-primary">
        <div class="card-header">
            <h4 class="m-b-0 text-white">Update User Details</h4>
        </div>
        <div class="card-body">

            <form action='' method='POST'>
                <div class="form-body">
                    
                    <hr>
                    <div class="row p-t-20">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Emp First Name</label>
                                <input type="text" name="emp_first_name" class="form-control"  readonly value="<?php echo $emp_first_name; ?>">
                                </div>
                                
                        </div>
                    
                        <div class="col-md-6">
                            <div class="form-group has-danger">
                                <label class="control-label">Last Name</label>
                                <input type="text" name="emp_last_name" class="form-control form-control-danger"  readonly value="<?php echo $emp_last_name; ?>">
                                </div>
                                
                        </div>
                    
                    </div>
                
                    <div class="row p-t-20">

                        <div class="col-md-6">
                            <div class="form-group has-danger">
                                <label class="control-label">Next of Kin Full Name</label>
                                <input type="text" name="full_name" class="form-control form-control-danger"  required value="<?php echo $next_of_kin_fullname; ?>">
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Next of Kin Phone Number </label>
                                <input type="text" name="phone" class="form-control" required value="<?php echo $next_of_kin_phone; ?>">
                            </div>
                        </div>
                
                      

                    </div>
      
                    <hr>
                    <div class="row p-t-20">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Next of Kin DOB</label>
                                <input type="text" name="dob" class="form-control"  required pattern="\d{4}-\d{2}-\d{2}" placeholder="yyyy-mm-dd" value="<?php echo $next_of_kin_dob; ?>">
                            </div>
                        </div>
                    
                        <div class="col-md-6">
                            <div class="form-group has-danger">
                                <label class="control-label">Relationship</label>
                                <input type="text" name="relationship" class="form-control form-control-danger"  required value="<?php echo $relationship; ?>">
                            </div>
                        </div>
                    
                    </div>

                    <hr>
                    <div class="row p-t-20">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Emp Salary</label>
                                <input type="text" name="salary" class="form-control"  readonly value="<?php echo $salary; ?>">
                            </div>
                        </div>
                    
                        <div class="col-md-6">
                            <div class="form-group has-danger">
                                <label class="control-label">Employee Savings</label>
                                <input type="text" name="savings" class="form-control form-control-danger"  readonly value="<?php echo $savings; ?>">
                            </div>
                        </div>
                    
                    </div>

                </div>
                <div class="form-actions">
                    <button type="submit" name="update_savings_btn" id="form_sub" class="btn btn-primary"> Update</button>
                    <a href="savings_plan.php" class="btn btn-inverse">Cancel</a>
                </div>
            </form>
        </div>
        
    </div>
    </div>
    <script>
        const form = document.querySelector('#for_sub');
        form.addEventListener('submit', getVal);

        function getVal(e){
            e.preventDefault()
        }
    </script>

<footer class="footer"> © 2023 - Job Retirement System All Right Reserved <span class="float-right">Version 1.0.0</span></footer>

    <?php include_once './includes/js_libraries.php';?>
</body>

</html>