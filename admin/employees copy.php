<?php 
    include_once './includes/connection.php'; 
    include_once './includes/header.php'; 
    // include_once './includes/preloader.php'; 
    include_once './includes/navbar.php'; 
    // include_once './includes/sidebar.php'; 

    if(!isset($_SESSION['admin_id'])){
        header('location: ../index.php');
    }
?>
<body class="fix-header fix-sidebar">
    <div id="main-wrapper">
        <div class="page-wrapper">
     
            <div class="container"><br>
            <?php

                if(isset($_SESSION['message'])){?>
                    <h5><?php echo $_SESSION['message']; ?></h5>
                <?php
                unset($_SESSION['message']);
                }
            ?>
                <div class="row">
                    <div class="col-12">
                        
                        <div class="col-lg-12">
                        <div class="card card-outline-primary">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Employees Lists</h4>
                            </div>
                             
                            
                            <div class="row" style="">
                               <?php
                                $fetchUserDetails = mysqli_query($conn, "SELECT *, next_of_kin.full_name, next_of_kin.relationship, next_of_kin.dob, next_of_kin.phone  FROM employees 
                                INNER JOIN next_of_kin ON employees.email = next_of_kin.emp_email");
                                while($row = mysqli_fetch_assoc($fetchUserDetails)){?>
                                    <div class="col-sm-3 col-xs-12 pt-2" style="box-shadow: 2px 5px 8px grey, -2px -5px 8px grey; margin: 8px 0 8px 0; border-radius: 10px;">
                                        <div class="row">
                                            <img class="m-auto" style="height: 100px; width: 100px; border-radius: 50%; margin: 18px; border: 2px solid grey;" src="<?php echo $row['image']; ?>" alt="noImage">
                                        </div>
                                        <div class="row">
                                            <div class="col"><br><div class="dropdown-divider"></div>
                                                <p style="color: black;">First Name: <span style="font-style: italic;"> <?php echo $row['first_name']; ?></span></p><div class="dropdown-divider"></div>
                                                <p style="color: black;">Last Name: <span style="font-style: italic;"> <?php echo $row['last_name']; ?></span></p><div class="dropdown-divider"></div>
                                                <p style="color: black;">Phone Number: <span style="font-style: italic;"> <?php echo $row['phone']; ?></span></p><div class="dropdown-divider"></div>
                                                <p style="color: black;">Email: <span style="font-style: italic;"> <?php echo $row['email']; ?></span></p><div class="dropdown-divider"></div>
                                                <p style="color: black;">Date Of Birth: <span style="font-style: italic;">  <?php echo $row['dob']; ?></span></p><div class="dropdown-divider"></div>
                                                <p style="color: black;">Address:  <span style="font-style: italic;"> <?php echo $row['address']; ?></span></p><div class="dropdown-divider"></div>
                                                <p style="color: black;">Position:  <span style="font-style: italic;"> <?php echo $row['position']; ?></span></p><div class="dropdown-divider"></div>
                                                <p style="color: black;">Salary: <span style="font-style: italic;">  <?php echo $row['salary']; ?></span></p><div class="dropdown-divider"></div>
                                                <p style="color: black;">Gender:  <span style="font-style: italic;"> <?php echo $row['gender']; ?></span></p><div class="dropdown-divider"></div>
                                                <p style="color: black;">Date Emp:  <span style="font-style: italic;"> <?php echo $row['date_emp']; ?></span></p><div class="dropdown-divider"></div>
                                                <a href="./edit_employee.php?emp_id=<?php echo $row['id']; ?>" class="btn btn-xs btn btn-warning">Edit</a>
                                                <a style="margin-left: 20%;" href="./employees_details.php?emp_id=<?php echo $row['id']; ?>" class="btn btn-xs btn btn-info">More</a>
                                                <a onclick="javascript: deleteUser(event); return false;" style="float: right;" href="delete_employee.php?emp_id=<?php echo $row['id']; ?>" class="btn btn-xs btn btn-danger">Delete</a><div class="dropdown-divider"></div>
                                                    
                                            </div>   
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
       
                               </div>
                                </div>
                            </div>
                        </div>
						 </div>
                      
                            </div>
                        </div>
                    </div>
                </div>
             
            </div>


            <script>
                function deleteUser(e){
                    const confirmUser = confirm("Are you sure you want to delete this employee?");
                    if(confirmUser){
                        window.location.href = e.attr("href");
                    }
                }
            </script>
                        <footer class="footer"> © 2023 - Job Retirement System All Right Reserved <span class="float-right">Version 1.0.0</span></footer>

           
        </div>
     
    </div>
    
<?php include_once './includes/js_libraries.php';?>
    
</body>

</html>