<!DOCTYPE html>
<html lang="en" >
<?php
include("./admin/includes/connection.php");
// error_reporting(0);
// session_start();
$error = "";
$success = "";

if(isset($_POST['forgot_password_btn'])){

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);

    

    $adminquery = "SELECT * FROM admin WHERE admin.email = '".$email."' && admin.first_name = '".$first_name."' " or die(mysqli_error($conn));
    $adminresult = mysqli_query($conn, $adminquery);
    $adminrow = mysqli_fetch_assoc($adminresult);

    $empquery = "SELECT * FROM employees WHERE employees.email = '".$email."' && employees.first_name = '".$first_name."' " or die(mysqli_error($conn));
    $empresult = mysqli_query($conn, $empquery);
    $emprow = mysqli_fetch_assoc($empresult);

        
        if(mysqli_num_rows($adminresult) > 0 || mysqli_num_rows($empresult) > 0){
           

            if($adminrow['user_type'] === 'admin'){
                $_SESSION['admin_id'] = $adminrow['id'];
            header('location: ./admin/new_password.php');

            }else if($emprow['user_type'] === 'employee') {
                $_SESSION['emp_id'] = $emprow['id'];  
            header('location: ./employee/new_password.php');

            }
           
        }else {
          
          $error = '<div class="alert alert-danger alert-dismissible fade show text-white" style="background: green;">
          Invalid Login Details
        </div>';
        ?>
           <script>
               setTimeout(() => {
                   document.getElementById('getMessage').style.display = 'none';
                   window.location = './forgot_password.php';
               }, 4000);
           </script>
        <?php
         
        }
    }
   
 
// }
?>

<head>
  <meta charset="UTF-8">
  <title>Forgot Password</title>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'>
  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Montserrat:400,700'>
  <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="./employee/css/login2_.css">
      <link rel="stylesheet" href="./employee/includes/bootstrapcss/css/bootstrap.min.css">

  
</head>

<body><br><br><br>

<div class="form">
<h3 class="p-3 text-white" >Reset Your Password</h3>
  <span id="getMessage"><?php echo $error; ?></span>
   

  <form class="login-form" action="" method="POST">

    <input type="email" placeholder="Email" name="email" required/>
    <input type="text" placeholder="First Name" name="first_name" required/>
    <input type="submit"  name="forgot_password_btn" value="Next" />
  <a style="text-decoration: none;" href="./index.php">I Remember my Password</a>
  </form>
  
</div>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src='./employee/js/index.js'></script>
  <script src='./employee/includes/js/bootstrap.bundle.min.js'></script>
</body>

</html>
