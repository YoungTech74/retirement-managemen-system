
<?php

    include_once './includes/connection.php'; 
    include_once './includes/header.php'; 
    include_once './includes/preloader.php'; 
    include_once './includes/navbar.php'; 
    include_once './includes/sidebar.php'; 


   
    


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Dashboard</title>
<style>
    * {
           margin: 0;
           padding: 0;
           box-sizing: border-box;
       }
       
     
       .table {
           width: 100%;
           border-collapse: collapse;
       }
       .table thead th {
           color: #ffffff;
           background: #3c3f44;
       }
       .table thead tr th {
           font-size: 14px;
           font-weight: 600;
           letter-spacing: 0.35px;
           color: #ffffff;
           opacity: 1;
           padding: 12px;
           vertical-align: top;
       }
       .table tbody tr td {
           font-size: 14px;
           letter-spacing: 0.35px;
           font-weight: normal;
           color: #f1f1f1;
           background: grey;
           padding: 8px;
           text-align: center;
           border: 1px solid #dee2e685;
       }
@media (max-width: 768px) {
   .table thead {
       display: none;
   }
   .table thead th {
           color: #ffffff;
           background: #3c3f44;
       }
   .table, .table tbody, .table tr, .table td {
       display: block;
       width: 100%;
   }
   .table tbody tr td {
       text-align: right;
       padding-left: 50%;
       position: relative;
   }
   .table tbody tr {
       margin-bottom: 10px;
   }
   .table td:before {
       content: attr(data-label);
       position: absolute;
       left: 0;
       width: 50%;
       padding-left: 15px;
       font-size: 14px;
       font-weight: 600;
       text-align: left;
   }
}
   </style>
</head>

<body class="fix-header fix-sidebar">
 
    <div id="main-wrapper">

        <div class="page-wrapper">
          
            
          
            <div class="container-fluid"><br>
         
                <div class="row">
                    <div class="col-12">
  
                        <div class="col-lg-12">
                <div class="card card-outline">
                    <div class="card-header">
                        
                    <?php 
if (isset($_SESSION['admin_id'])) {
    $getUserInfo = mysqli_query($conn, "SELECT * FROM admin WHERE id = '$_SESSION[admin_id]'");
    while ($row = mysqli_fetch_assoc($getUserInfo)) {
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
    }
    ?>
                       
                        <h4 class="m-b-0 text-dark text-center p-5">
                        Welcome Back <?php echo $first_name; echo ' '; echo $last_name; ?>

                        </h4>
                    </div>
                                
                    <div class="table-responsive m-t-40">
  
</div>
</div>
</div>

</div>

</div>
</div>
</div>
</div>       
</div>
  <?php
}
?>  
<!----------------------------- confirm before delete menu function  ------------------------->
<script>
    function confirmDeletion(e){
        const confirmBeforeDelete = confirm("Are you sure you want to delete this Menu?");
        if(confirmBeforeDelete){
            window.location.href = e.attr("href");
        }
    }
</script>
            <footer class="footer"> © 2023 - Job Retirement System All Right Reserved <span class="float-right">Version 1.0.0</span></footer>
           
        </div>
       
    </div>
    
    <script src="js/lib/jquery/jquery.min.js"></script>
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/lib/datatables/datatables.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="js/lib/datatables/datatables-init.js"></script>
</body>

</html>