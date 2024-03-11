<?php
    error_reporting(0);
    include_once './includes/connection.php';
    include_once './includes/sidebar.php';
    include_once './includes/navbar.php';

    
    if(isset($_GET['message_id'])){
        $message_id = $_GET['message_id'];

        $get_message = mysqli_query($conn, "SELECT * FROM emp_inbox  WHERE un_read_msg = 0 && emp_id = '$message_id' ORDER BY id DESC");
       
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
        .msg {
            -o-text-overflow: ellipsis;
            text-overflow: ellipsis;
            overflow: hidden;
            white-space: nowrap;
            width: 110px;
        }
    </style>
</head>

<body class="fix-header">


    
    <div id="main-wrapper">
     
        <div class="page-wrapper">

            <div class="container-fluid">
                
            <div class="col-lg-12">
                        <div class="card card-outline-primary">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Your Inbox</h4> <span class="float-right"><a href="./dashboard.php"><i class="fa fa-arrow-left text-white" style="margin-top: -20px;"></i></a></span>
                            </div>

                            <?php
                            $check_message = mysqli_query($conn, "SELECT * FROM emp_inbox WHERE un_read_msg = 1 && emp_id = '$message_id' ORDER BY id DESC");
                            if(mysqli_num_rows($check_message) > 0){
                                while($message = mysqli_fetch_assoc($check_message)){?>
                                    <a href="message_content.php?mgs_content_id=<?php echo $message['id']; ?>">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card p-30" style="background: gre;"> <span style="margin-top: -30px; margin-left: -20px; color: red;">New</span>
                                                    <div class="media">
                                                        <div class="media-left meida media-middle">
                                                            <span><i class="fa fa-inbo f-s-40" aria-hidden="true"></i></span>
                                                        </div>
                                                        <div class="media-body media-text-left">
                                                        <h4 class="text-dark">Sender: Lady TK</h4>
                                                            <p class="m-b-0 msg"><?php echo $message['message']; ?></p>
                                                            <span class="float-right text-dark" style="margin-bottom: -40px;"><?php echo $message['date_created'];?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                        <?php
                                    
                                    }
        
                                ?>

                                <?php
                            }
                                while($msg = mysqli_fetch_assoc($get_message)){?>
                                    <a href="message_content.php?mgs_content_id=<?php echo $msg['id']; ?>">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card p-30">
                                                    <div class="media">
                                                        <div class="media-left meida media-middle">
                                                            <span><i class="fa fa-inbo f-s-40" aria-hidden="true"></i></span>
                                                        </div>
                                                        <div class="media-body media-text-left">
                                                        <h4 class="">Sender: Lady TK</h4>
                                                            <p class="m-b-0 text-dark msg"><?php echo $msg['message']; ?>.......</p>
                                                            <span class="float-right text-dark" style="margin-bottom: -40px;"><?php echo $msg['date_created'];?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                        <?php
                                    
                                    }
        
                                ?>
                                <?php
                            // }
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
