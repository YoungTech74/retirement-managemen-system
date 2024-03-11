<!DOCTYPE html>
<html lang="en" >
<?php
include("./employee/includes/connection.php");
// error_reporting(0);
// session_start();
$error = "";
$success = "";

if(isset($_POST['loginUser'])){

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $hashPassword = md5($password);

    $adminquery = "SELECT * FROM admin WHERE admin.email = '".$email."' && admin.password = '".$hashPassword."' " or die(mysqli_error($conn));
    $adminresult = mysqli_query($conn, $adminquery);
    $adminrow = mysqli_fetch_assoc($adminresult);

    $empquery = "SELECT * FROM employees WHERE employees.email = '".$email."' && employees.password = '".$hashPassword."' " or die(mysqli_error($conn));
    $empresult = mysqli_query($conn, $empquery);
    $emprow = mysqli_fetch_assoc($empresult);

        
        if(mysqli_num_rows($adminresult) > 0 || mysqli_num_rows($empresult) > 0){
            $_SESSION['userId'] = $row['id'];

            if($adminrow['user_type'] === 'admin'){
                $_SESSION['admin_id'] = $adminrow['id'];
                $_SESSION['admin_first'] = $adminrow['first_name'];
            header('location: ./admin/dashboard.php');

            }else if($emprow['user_type'] === 'employee') {
                $_SESSION['emp_id'] = $emprow['id'];
                $_SESSION['emp_email'] = $emprow['email'];
                $_SESSION['emp_first'] = $emprow['first_name'];  
            header('location: ./employee/dashboard.php');

            }
           
        }else {
          
          $error = '<div class="alert alert-danger alert-dismissible fade show"">
          Invalid Login Details
        </div>';
        ?>
           <script>
               setTimeout(() => {
                   document.getElementById('getMessage').style.display = 'none';
                   window.location = './index.php';
               }, 4000);
           </script>
        <?php
         
        }
    }
   
 
// }
?>

<head>
  <meta charset="UTF-8">
  <title>Login Page</title>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'>
  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Montserrat:400,700'>
  <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="./employee/css/login2_.css">
      <link rel="stylesheet" href="./employee/includes/bootstrapcss/css/bootstrap.min.css">

  
</head>

<body><br><br><br>

<div class="form">
<h1 class="p-3 text-white" >User Login</h1>
  <div class="thumbnail"><img style="border-radius: 50%; margin-top: -41px;" src="./images/images.jpeg"/></div>
  <span id="getMessage"><?php echo $error; ?></span>
   

  <form class="login-form" action="index.php" method="POST">

    <input type="email" placeholder="Email" name="email" required/>
    <input type="password" placeholder="Password" name="password" required/>
    <input type="submit"  name="loginUser" value="Login" />
  <a style="text-decoration: none;" href="forgot_password.php">Forgot Password?</a>
  </form>
  
</div>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src='./employee/js/index.js'></script>
  <script src='./employee/includes/js/bootstrap.bundle.min.js'></script>
</body>

</html>
