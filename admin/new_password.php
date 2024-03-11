<!DOCTYPE html>
<html lang="en" >
<?php
include("./includes/connection.php");
// error_reporting(0);
// session_start();
$error = "";
$success = "";
$notMatch = "";


$emp_id = $_SESSION['admin_id'];

if(isset($_POST['forgot_password_btn'])){

    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);

    $hashPassword = md5($password);

    if($password !== $confirm_password){
        $notMatch = 'Password do not match!';
    }else {
        $updatePassword = mysqli_query($conn, "UPDATE admin SET password = '$hashPassword' WHERE id = '$emp_id'");

        if($updatePassword){
      
            $error = '<div class="alert alert-success  text-white" style="background: green;">
                Your Password has been Reset Successfully.
              </div>';
              ?>
                 <script>
                     setTimeout(() => {
                         document.getElementById('getMessage').style.display = 'none';
                         window.location = '../index.php';
                     }, 2000);
                 </script>
              <?php
        }else {
            $error = '<div class="alert alert-danger alert-dismissible fade show text-white" style="background: red;">
            Something Went wrong while changing your password
          </div>';
          ?>
             <script>
                 setTimeout(() => {
                     document.getElementById('getMessage').style.display = 'none';
                     window.location = './new_password.php';
                 }, 4000);
             </script>
          <?php
        }
    }
   
    }
    
   
 
// }
?>

<head>
  <meta charset="UTF-8">
  <title>Reset Password</title>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'>
  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Montserrat:400,700'>
  <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="../employee/css/login2_.css">
      <link rel="stylesheet" href="../employee/includes/bootstrapcss/css/bootstrap.min.css">

  
</head>

<body><br><br><br>

<div class="form">
<h3 class="p-3 text-white" >Choose New Password</h3>
  <span id="getMessage"><?php echo $error; ?></span>
   

  <form class="login-form" action="" method="POST">

    <input type="password" placeholder="Password" name="password" required/>
    <input type="password" placeholder="Confirm Password" name="confirm_password" required/>
    <small style="color: red; font-style: italic;"><?php echo $notMatch; ?></small>
    <input type="submit"  name="forgot_password_btn" value="Reset Now" />
  <a style="text-decoration: none;" href="../index.php">I Remember my Password</a>
  </form>
  
</div>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src='./employee/js/index.js'></script>
  <script src='./employee/includes/js/bootstrap.bundle.min.js'></script>
</body>

</html>
