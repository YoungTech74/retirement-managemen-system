<?php
    include_once './includes/connection.php';
    include_once './includes/sidebar.php';
    include_once './includes/navbar.php';

    
    if(isset($_GET['mgs_content_id'])){
        
        $msg_content_id = $_GET['mgs_content_id'];

        mysqli_query($conn, "UPDATE emp_inbox SET inbox_count = 0, un_read_msg = 0 WHERE id = '$msg_content_id'");

        $get_message = mysqli_query($conn, "SELECT * FROM emp_inbox WHERE id = '$msg_content_id' LIMIT 1");
    
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Employee Inbox</title>
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <style>
        .message {
            /* word-spacing: 3px; */
            /* padding: 20px;
            text-height: 20px; */
        }
    </style>
</head>

<body class="fix-header">


    
    <div id="main-wrapper">
     
        <div class="page-wrapper">

            <div class="container-fluid">
            <div class="col-lg-12">
                        <div class="card card-outline-primary" style="width: 60%; background: grey;">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Message Content</h4>
                            </div>

                            <?php
                            while($msg = mysqli_fetch_assoc($get_message)){?>
                           
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card p-30">
                                            <div class="media">
                                                <div class="media-left meida media-middle">
                                                    <span><i class="fa fa-inbo f-s-40" aria-hidden="true"></i></span>
                                                </div>
                                                <div class="media-body media-text-left">
                                                    <p class="m-b-0 text-dark text-center message"><?php echo $msg['message']; ?></p>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                          
                                <?php
                            
                            }

                        ?>
                 


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
