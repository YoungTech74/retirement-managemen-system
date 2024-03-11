<!DOCTYPE html>
<html lang="en">
<?php
include_once './includes/connection.php';
include_once './includes/sidebar.php';
include_once './includes/navbar.php';

if(isset($_SESSION['emp_id'])){
    $emp_id = $_SESSION['emp_id'];

    $totalSavings = "";
    $salary = "";
    $month = "";

    $getSalary = mysqli_query($conn, "SELECT * FROM employees WHERE id = '$emp_id'");
    while($salaryRow = mysqli_fetch_assoc($getSalary)){
        $salary = $salaryRow['salary'];
    }

    $getSavings = mysqli_query($conn, "SELECT * FROM saving_plan WHERE emp_id = '$emp_id'");
    while($row = mysqli_fetch_assoc($getSavings)){
        $totalSavings = $row['savings_amt'];

    }

    if(mysqli_num_rows($getSavings) == 0){
        $totalSavings = 0;
    }

    $getMonth = mysqli_query($conn, "SELECT SUM(month_count) AS month_record FROM saving_plan WHERE emp_id = '$emp_id'");
    while($monthRow = mysqli_fetch_assoc($getMonth)){
        $month = $monthRow['month_record'];
        
    }
    if(mysqli_num_rows($getMonth) === 0){
        $month = 0;
    }
}else {
    header('location: ../index.php');
}

    $inbox = mysqli_query($conn, "SELECT COUNT(inbox_count) AS inbox_message FROM emp_inbox WHERE emp_id = '$emp_id' && un_read_msg = 1");
    while($msg = mysqli_fetch_assoc($inbox)){
        $message = $msg['inbox_message'];
       
    }


    if(isset($_POST['view_inbox'])){
        
    }
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Employee Panel</title>
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="fix-header">


    
    <div id="main-wrapper">
     
        <div class="page-wrapper">

            <div class="container-fluid">
            <div class="col-lg-12">
                        <div class="card card-outline-primary">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Employee Dashboard</h4>
                            </div>

                            
                     <div class="row">
                   
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                               
                                <div class="media-body media-text-left">
                                    <h2 class="text-center"><span style="text-decoration-line: line-through; text-decoration-style: double; font-size: 25px;">N</span> <?php echo $salary ; ?>.00</h2>
                                    <h2 class="text-center"></h2>
                                    <p class="m-b-0 text-dark text-center">Monthly Salary</p>
                                </div>
                            </div>
                        </div>
                    </div>
					
					 <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-inbo f-s-40" aria-hidden="true"></i></span>
                                </div>
                                <div class="media-body media-text-left">
                                <h2 class="text-center"><span style="text-decoration-line: line-through; text-decoration-style: double; font-size: 25px;">N</span> <?php echo $totalSavings ; ?>.00</h2>
                                <h2 class="text-center"></h2>
                                    <p class="m-b-0 text-center text-dark">Total Savings</p>
                                </div>
                            </div>
                        </div>
                    </div>
					
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-use f-s-40"></i></span>
                                </div>
                                <div class="media-body media-text-left">
                                    <h2 class="text-center"><?php echo $month; ?></h2>
                                    <h2 class="text-center"></h2>
                                    <p class="m-b-0 text-center text-dark">Months</p>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-use f-s-40"></i></span>
                                </div>
                                <div class="media-body media-text-left">
                                    <h2 class="text-center">Inbox</h2>
                                    <h2 class="text-center text-danger"><?php echo $message; ?></h2>
                                    <p class="m-b-0 text-center text-dark">
                                        <?php
                                            $geMessage = mysqli_query($conn, "SELECT * FROM employees WHERE id = '$_SESSION[emp_id]'");
                                            while($msg = mysqli_fetch_assoc($geMessage)){
                                                $message_id = $msg['id'];
                                            }
                                        ?>
                                        <!-- <button  type="submit" name="view_inbox" class="btn btn-xs btn btn-primary">View</button> -->
                                        <a href="message.php?message_id=<?php echo $message_id; ?>" class="btn btn-xs btn btn-info">View</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
					

                </div>
            </div>
        </div>     
    </div>
   
    <script src="js/lib/jquery/jquery.min.js"></script>
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="js/custom.min.js"></script><br><br><br><br><br><br><br><br>

    <footer class="footer"> © 2023 - Job Retirement System. All Right Reserved <span class="float-right">Version 1.0.0</span></footer>

</body>

</html>
