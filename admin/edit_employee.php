
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

$emp_id = $_GET['emp_id'];
$notMatchPasswordError = "";
    $firstname = "";
    $last_name = "";
    $phone = "";
    $dob = "";
    $address = "";
    $email = "";
    $position = "";
    $salary = "";
    $password = "";
    $gender = "";
    $next_kin_full_name = "";
    $next_of_kin_phone = "";
    $relationship = "";
    $next_kin_dob = "";
    $message = "";
   
 $getRecord = mysqli_query($conn, "SELECT * FROM  employees WHERE id = '$emp_id';") or die(mysqli_error($conn));
    
 while($user = mysqli_fetch_assoc($getRecord)){
    $firstname = $user['first_name'];
    $last_name = $user['last_name'];
    $phone = $user['phone'];
    $dob = $user['dob'];
    $email = $user['email'];
    $address = $user['address'];
    $position = $user['position'];
    $salary = $user['salary'];
    $salary = $user['salary'];
    $oldPassword = $user['password'];
    $gender = $user['gender'];
    $next_kin_full_name = $user['nok_name'];
    $next_of_kin_phone = $user['nok_phone'];
    $next_kin_dob = $user['nok_dob'];
    $relationship = $user['relationship'];
    $image = $user['image'];
 }

if (isset($_POST['update_emp_btn'])) {

    $firstname = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $position = mysqli_real_escape_string($conn, $_POST['position']);
    $salary = mysqli_real_escape_string($conn, $_POST['salary']);
    $newPassword = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);

    $next_kin_full_name = mysqli_real_escape_string($conn, $_POST['nok_name']);
    $relationship = mysqli_real_escape_string($conn, $_POST['relationship']);
    $next_kin_dob = mysqli_real_escape_string($conn, $_POST['nok_dob']);
    $next_of_kin_phone = mysqli_real_escape_string($conn, $_POST['nok_phone']);


    $hash_password = md5($newPassword);
    // $hash_password = password_hash($password, PASSWORD_DEFAULT);

    //-------------------- insert image --------------------
    $path = '../images/';
    $filename = $path.basename($_FILES['file']['name']);
    move_uploaded_file($_FILES['file']['tmp_name'], $filename);

    if($newPassword !== $confirm_password){
        $notMatchPasswordError = "Passwords do not match!";
    }else {

     if((!isset($newPassword) || empty($newPassword) || is_null($newPassword) || $newPassword == "") && (empty($_FILES['file']['name'])) ){
            $updateWithoutNewPassword = mysqli_query($conn, "UPDATE employees SET first_name = '$firstname', last_name = '$last_name', phone = '$phone', email = '$email', dob = '$dob', 
            address = '$address', position = '$position', salary = '$salary', 
            nok_name = '$next_kin_full_name', relationship = '$relationship', nok_phone = '$next_of_kin_phone', nok_dob = '$next_kin_dob', password = '$oldPassword',  gender = '$gender',  image = '$image' WHERE id ='$emp_id'") or die(mysqli_error($conn));
             if ($updateWithoutNewPassword) {
                $message = '<div class="alert alert-success alert-dismissible fade show text-white" style="background: green;">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                Employee Updated Successfully.
              </div>';
              ?>
                 <script>
                     setTimeout(() => {
                         document.getElementById('getMessage').style.display = 'none';
                         window.location = './employees.php';
                     }, 4000);
                 </script>
              <?php
            }
        }else if(!empty($_FILES['file']['name']) && (!isset($newPassword) || empty($newPassword) || is_null($newPassword) || $newPassword == "")){
                $updateOnFile = mysqli_query($conn, "UPDATE employees SET first_name = '$firstname', last_name = '$last_name', phone = '$phone', email = '$email', dob = '$dob', 
                address = '$address', position = '$position', salary = '$salary', 
                nok_name = '$next_kin_full_name', relationship = '$relationship', nok_phone = '$next_of_kin_phone', nok_dob = '$next_kin_dob', password = '$oldPassword', gender = '$gender', image = '$filename' WHERE id ='$emp_id'") or die(mysqli_error($conn));
            if ($updateOnFile) {
            $message = '<div class="alert alert-success alert-dismissible fade show text-white" style="background: green;">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Employee Updated Successfully.
            </div>';
            ?>
                <script>
                    setTimeout(() => {
                        document.getElementById('getMessage').style.display = 'none';
                        window.location = './employees.php';
                    }, 4000);
                </script>
            <?php
            }
        }else if(!(!isset($newPassword) || empty($newPassword) || is_null($newPassword) || $newPassword == "") && (empty($_FILES['file']['name']))){

            $updateOnlyPassword = mysqli_query($conn, "UPDATE employees SET first_name = '$firstname', last_name = '$last_name', phone = '$phone', email = '$email', dob = '$dob', 
            address = '$address', position = '$position', salary = '$salary', 
            nok_name = '$next_kin_full_name', relationship = '$relationship', nok_phone = '$next_of_kin_phone', nok_dob = '$next_kin_dob', password = '$hash_password',  gender = '$gender',  image = '$image' WHERE id ='$emp_id'") or die(mysqli_error($conn));
             if ($updateOnlyPassword) {
                $message = '<div class="alert alert-success alert-dismissible fade show text-white" style="background: green;">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                Employee Updated Successfully.
              </div>';
              ?>
                 <script>
                     setTimeout(() => {
                         document.getElementById('getMessage').style.display = 'none';
                         window.location = './employees.php';
                     }, 4000);
                 </script>
              <?php
            }
        }else{
            $updateWithNewPassword = mysqli_query($conn, "UPDATE employees SET first_name = '$firstname', last_name = '$last_name', phone = '$phone', email = '$email', dob = '$dob', 
            address = '$address', position = '$position', salary = '$salary',
             nok_name = '$next_kin_full_name', relationship = '$relationship', nok_phone = '$next_of_kin_phone', nok_dob = '$next_kin_dob', password = '$hash_password',  gender = '$gender',  image = '$filename' WHERE id ='$emp_id'") or die(mysqli_error($conn));
             if ($updateWithNewPassword) {
                $message = '<div class="alert alert-success alert-dismissible fade show text-white" style="background: green;">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                Employee Updated Successfully.
              </div>';
              ?>
                 <script>
                     setTimeout(() => {
                         document.getElementById('getMessage').style.display = 'none';
                         window.location = './employees.php';
                     }, 4000);
                 </script>
              <?php
            }
        }
   
    }
}
// }
?>
<head>
    <title>Update Employee</title>
</head>
    <div class="page-wrapper">

        <div class="container-fluid"><br>
                <span id="getMessage"><?php echo $message; ?></span>
    <div class="col-lg-12">
    <div class="card card-outline-primary">
        <div class="card-header">
            <h4 class="m-b-0 text-white">Update Employee Profile</h4>
        </div>
        <div class="card-body">

        <form action='' method='POST'  enctype="multipart/form-data" id="form_sub" name='reg'>
                <div class="form-body">
                    
                    <hr>
                    <div class="row p-t-20">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">First Name</label>
                                <input type="text" name="first_name" class="form-control" value="<?php echo $firstname; ?>">
                                </div>
                                
                        </div>
                    
                        <div class="col-md-4">
                            <div class="form-group has-danger">
                                <label class="control-label">Last Name</label>
                                <input type="text" name="last_name" class="form-control form-control-danger"  value="<?php echo $last_name; ?>">
                                </div>
                                
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Phone Number </label>
                                <input type="text" name="phone" class="form-control" value="<?php echo $phone; ?>">
                            </div>
                        </div>
                
                    
                    </div>
      
                    <hr>
                    <div class="row p-t-20">

                    <div class="col-md-4">
                            <div class="form-group has-danger">
                                <label class="control-label">Email Address</label>
                                <input type="email" name="email" class="form-control form-control-danger"  value="<?php echo $email; ?>">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Date of Birth</label>
                                <input type="text" name="dob" class="form-control"  value="<?php echo $dob; ?>" pattern="\d{4}-\d{2}-\d{2}" placeholder="yyyy-mm-dd">
                            </div>
                        </div>
                    
                        <div class="col-md-4">
                            <div class="form-group has-danger">
                                <label class="control-label">Address</label>
                                <input type="text" name="address" class="form-control form-control-danger"  value="<?php echo $address; ?>">
                            </div>
                        </div>
                    
                    </div>

                    <hr>
                    <div class="row p-t-20">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Position</label>
                                <input type="text" name="position" class="form-control"   value="<?php echo $position; ?>">
                            </div>
                        </div>
                    
                        <div class="col-md-4">
                            <div class="form-group has-danger">
                                <label class="control-label">Salary</label>
                                <input type="text" name="salary" class="form-control form-control-danger"  autocomplete="off" value="<?php echo $salary; ?>">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Password</label>
                                <input type="password" name="password" class="form-control"   value="">
                                <small class="text-danger" style="font-style: italic;">You can leave this field blank if you don't wnat to change you password</small>
                            </div>
                        </div>
                    
                    </div>

 

                    <hr>
                    <div class="row p-t-20">

                    <div class="col-md-4">
                            <div class="form-group has-danger">
                                <label class="control-label">Confirm Password</label>
                                <input type="password" name="confirm_password" class="form-control form-control-danger"  value="">
                                <small class="text-danger" style="font-style: italic;">You can leave this field blank if you don't wnat to change you password</small>
                            </div>
                            <small class="text-danger"><?php echo $notMatchPasswordError; ?></small>
                        </div>

                    
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Gender</label><br>
                               Male <input type="radio" name="gender" value="Male"  <?php if($gender === "Male"){echo "checked"; } ?> required > &nbsp;&nbsp;
                               Female <input type="radio" name="gender" value="Female" <?php if($gender === "Female"){echo "checked"; } ?> required>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <img style="border-radius: 50%; border: 2px solid grey; width: 100px; height: 100px; margin-left: 40%;" src="<?php echo $image; ?>" alt="">
                            <div class="form-group has-danger">
                                <label class="control-label">Image</label>
                                <input type="file" name="file"  id="lastName" class="form-control form-control-danger">
                            </div>
                        </div>
                     
                    </div>


                    <!-------------------------- next of kin section  ------------------------->
                    <hr>
                    <div class="row p-t-20">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Next of kin Fullname</label>
                                <input type="text" name="nok_name" class="form-control"   value="<?php echo $next_kin_full_name; ?>">
                            </div>
                        </div>
                    
                        <div class="col-md-3">
                            <div class="form-group has-danger">
                                <label class="control-label">Relationship</label>
                                <input type="text" name="relationship" class="form-control form-control-danger"  autocomplete="off" value="<?php echo $relationship; ?>">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Next of Kin Phone</label>
                                <input type="text" name="nok_phone" class="form-control"   value="<?php echo $next_of_kin_phone; ?>">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Next of Kin Dob</label>
                                <input type="text" name="nok_dob" class="form-control"  required pattern="\d{4}-\d{2}-\d{2}" placeholder="yyyy-mm-dd" value="<?php echo $next_kin_dob; ?>">
                            </div>
                        </div>
                    
                    </div>


                    </div>
                    
                    </div>
                </div>
                <div class="form-actions">
                    <button type="submit" name="update_emp_btn" id="form_sub" class="btn btn-primary">Update</button>
                    <a href="employees.php" class="btn btn-inverse">Cancel</a>
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