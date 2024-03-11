<?php 
    include_once './includes/connection.php'; 
    include_once './includes/header.php'; 
    include_once './includes/preloader.php'; 
    include_once './includes/navbar.php'; 
    include_once './includes/sidebar.php'; 

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
                               

                               $fetchUserDetails = mysqli_query($conn, "SELECT * FROM employees");
                                    while($row = mysqli_fetch_assoc($fetchUserDetails)){
                                     
                                    // }
                                ?>
                                    <div class="col-sm-12 col-xs-12 pt-2" style="box-shadow: 2px 5px 8px grey, -2px -5px 8px grey; margin: 8px 0 8px 0; border-radius: 10px;">
                                        <div class="row">
                                            <img class="m-auto" style="height: 100px; width: 100px; border-radius: 50%; margin: 18px; border: 2px solid grey;" src="<?php echo $row['image']; ?>" alt="noImage">
                                        </div><br>
                                        <center><h2 style="border-bottom: 2px solid blue; width: 200px;">Employee Details</h2></center>
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>FirstName</th>
                                                <th>LastName</th>
                                                <th>Phone </th>
                                                <th>Email Address</th>
                                                <th>DOB</th>
                                                <th>Address</th>
                                                <th>Position</th>
                                                <th>Salary</th>
                                                <th>Gender</th>
                                                <th>Date Emp</th>
                                            </tr>

                                            <tr>
                                                <td><?php echo $row['first_name']; ?></td>
                                                <td><?php echo $row['last_name']; ?></td>
                                                <td><?php echo $row['phone']; ?></td>
                                                <td><?php echo $row['email']; ?></td>
                                                <td><?php echo $row['dob']; ?></td>
                                                <td><?php echo $row['address']; ?></td>
                                                <td><?php echo $row['position']; ?></td>
                                                <td><?php echo $row['salary']; ?></td>
                                                <td><?php echo $row['gender']; ?></td>
                                                <td><?php echo $row['date_emp']; ?></td>
                                            </tr>

                                        </table><br>

                                        <center><h2 style="border-bottom: 2px solid blue; width: 240px;">Next Of Kin Details</h2></center>

                                        <table class="table table-bordered">
                                            <tr>
                                                <th>Full Name</th>
                                                <th>Relationship</th>
                                                <th>Phone</th>
                                                <th>Date Of Birth</th>
                                            </tr>

                                            <tr>
                                                <td><?php echo $row['nok_name']; ?></td>
                                                <td><?php echo $row['relationship'];?></td>
                                                <td><?php echo $row['nok_phone']; ?></td>
                                                <td><?php echo $row['nok_dob']; ?></td>
                                              
                                            </tr>
                                            
                                        </table><br>
                                        <div class="row">
                                            <div class="col">
                                            <a onclick="javascript: deleteUser(event); return false;" style="float: right;" href="delete_employee.php?emp_id=<?php echo $row['id']; ?>" class="btn btn-xs btn btn-danger m-2">Delete</a>
                                                <a style="float: right;" href="./dashboard.php" class="btn btn-xs btn btn-dark  m-2">Cancel</a>
                                            <a style="float: right;" href="./edit_employee.php?emp_id=<?php echo $row['id']; ?>" class="btn btn-xs btn btn-warning m-2">Edit</a>
 
                                            </div>   
                                        </div>

                                    </div>
                             
                                    <?php } ?>
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