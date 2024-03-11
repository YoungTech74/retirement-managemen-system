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
       
                <div class="row">
                    <div class="col-12">
                        
                        <div class="col-lg-12">
                        <div class="card card-outline-primary">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Employees Lists</h4>
                            </div>
                             
                            
                            <div class="row" style="">
                               <?php
                               $emp_id = $_GET['emp_id'];

                                $fetchUserDetails = mysqli_query($conn, "SELECT *, next_of_kin.full_name, next_of_kin.relationship, next_of_kin.dob, next_of_kin.phone 
                                 FROM employees INNER JOIN next_of_kin ON employees.email = next_of_kin.emp_email WHERE employees.id = '$emp_id'"); 
                                    while($row = mysqli_fetch_assoc($fetchUserDetails)){
                                        $firstname = $row['first_name'];
                                        $lastname = $row['last_name'];
                                        $phone = $row['phone'];
                                        $email = $row['email'];
                                        $dob = $row['dob'];
                                        $address = $row['address'];
                                        $position = $row['position'];
                                        $salary = $row['salary'];
                                        $gender = $row['gender'];
                                        $date_emp = $row['date_emp'];
                                        $image = $row['image'];
                                    }
                                ?>
                                    <div class="col-sm-12 col-xs-12 pt-2" style="box-shadow: 2px 5px 8px grey, -2px -5px 8px grey; margin: 8px 0 8px 0; border-radius: 10px;">
                                        <div class="row">
                                            <img class="m-auto" style="height: 100px; width: 100px; border-radius: 50%; margin: 18px; border: 2px solid grey;" src="<?php echo $image; ?>" alt="noImage">
                                        </div><br>
                                        <center><h2 style="border-bottom: 2px solid blue; width: 200px;">Employee Details</h2></center>
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Phone Number</th>
                                                <th>Email</th>
                                                <th>Date Of Birth</th>
                                                <th>Address</th>
                                                <th>Position</th>
                                                <th>Salary</th>
                                                <th>Gender</th>
                                                <th>Date Emp</th>
                                            </tr>

                                            <tr>
                                                <td><?php echo $firstname ?></td>
                                                <td><?php echo $lastname ?></td>
                                                <td><?php echo $phone ?></td>
                                                <td><?php echo $email ?></td>
                                                <td><?php echo $dob ?></td>
                                                <td><?php echo $address ?></td>
                                                <td><?php echo $position ?></td>
                                                <td><?php echo $salary ?></td>
                                                <td><?php echo $gender ?></td>
                                                <td><?php echo $date_emp ?></td>
                                            </tr>
                                        </table><br>

                                        <center><h2 style="border-bottom: 2px solid blue; width: 240px;">Next Of Kin Details</h2></center>

                                        <table class="table table-bordered">
                                            <tr>
                                                <th>Full Name</th>
                                                <th>Relationship</th>
                                                <th>Date Of Birth</th>
                                            </tr>

                                            <tr>
                                                <td><?php echo $firstname ?></td>
                                                <td><?php echo $lastname ?></td>
                                                <td><?php echo $phone ?></td>
                                              
                                            </tr>
                                        </table><br>
                                        <div class="row">
                                            <div class="col">
                                                
                                                <a href="./employees.php" class="btn btn-xs btn btn-dark float-right m-2">Back</a>
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