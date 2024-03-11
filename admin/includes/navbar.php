<?php  
//    session_start();
$first_name = "";
$last_name = "";
   $conn = mysqli_connect('localhost', 'root', '', 'retirement_db');
   if(!$conn){
       die(mysqli_error($conn));
   }
?>
<div class="header">
    <nav class="navbar top-navbar navbar-expand-md navbar-light">
        <div class="navbar-header">
            <a class="navbar-brand" href="dashboard.php">
                RMS
                <span><img style="height: 70px; width: 70px; border-radius: 50%;" src="../images/logo.jpg" alt="homepage" class="dark-logo" /></span>
            </a>
        </div>
        <div class="navbar-collapse">
            
            <ul class="navbar-nav mr-auto mt-md-0">
                <?php 
                    if(isset($_SESSION['admin_id'])){
                        $getUserInfo = mysqli_query($conn, "SELECT * FROM admin WHERE id = '$_SESSION[admin_id]'");
                        while($row = mysqli_fetch_assoc($getUserInfo)){
                            $first_name = $row['first_name'];
                            $last_name = $row['last_name'];
                            $image = $row['image'];
                        }
                ?>
            </ul>
    
            <ul class="navbar-nav my-lg-0">
         
               <li class="nav-item mt-3" style="margin-"> <?php echo $first_name; echo ' '; echo $last_name ?></li>
                <li class="nav-item dropdown">

                            <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img style="height: 30px; width: 30px; border-radius: 50%; border: 2px solid grey;" src="../images/<?php echo $image; ?>" alt="user" class="profile-pic" /></a>
                    <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                        <ul class="dropdown-user">
                            <li><a href="../logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                        </ul>
                    </div>
                </li>
        <?php

            }else {
                echo 'login';
            }
                ?>
            </ul>
        </div>
    </nav>
</div>
   