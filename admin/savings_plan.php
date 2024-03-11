
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Savings Plan</title>
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
            <?php
                if(isset($_SESSION['message'])){?>
                    <h5><?php echo $_SESSION['message']; ?></h5>
                <?php
                unset($_SESSION['message']);
                ?>
                    <script>
                        setTimeout(() => {
                            window.location.href = window.location.href; 
                        }, 3000);
                    </script>
                <?php
                }

            ?>
                <div class="row">
                    <div class="col-12">
  
                        <div class="col-lg-12">
                <div class="card card-outline-primary">
                    <div class="card-header">
                        
                       
                       
                        <h4 class="m-b-0 text-white">Employees Savings Plan List</h4>
                    </div>
                                
                    <div class="table-responsive m-t-40">
                        <!-- <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%"> -->
                        <table class="table">

    <thead>
    <tr >
        <th>Emp First</th>
        <th>Emp Last </th>
        <th>Emp Salary </th>
        <th>Emp Savings </th>
        <th>Next Of Kin </th>
        <th>Next of Kin Phone </th>
        <th>Relationship </th>
        <th>DOB</th>
        <th>Date Join </th>
        <th>Action </th>
            
        </tr>
    </thead>
    <tbody>
        <?php
         $pensionList = mysqli_query($conn, "SELECT * FROM saving_plan");
         while($row = mysqli_fetch_assoc($pensionList)){?>
        <tr>
            <td data-label="First Name"><?php echo $row['emp_first_name']; ?> </td>
            <td data-label="Last Name"><?php echo $row['emp_last_name']; ?></td>
            <td data-label="Phone"><span style="text-decoration-line: line-through; text-decoration-style: double;">N</span> <?php echo $row['salary']; ?></td>
            <td data-label="Email"><span style="text-decoration-line: line-through; text-decoration-style: double;">N</span> <?php echo $row['savings_amt']; ?></td>
            <td data-label="Address"><?php echo $row['next_of_kin_fullname']; ?></td>
            <td data-label="Gender"><?php echo $row['next_of_kin_phone']; ?></td>
            <td data-label="Date of Birth"><?php echo $row['relationship']; ?></td>
            <td data-label="Position"><?php echo $row['next_of_kin_dob']; ?></td>
            <td data-label="Pension Amount"><?php echo $row['date_created']; ?></td>
            <td data-label="Action">
          <a href="edit_savings_plan.php?savings_id=<?php echo $row['id']; ?>"><span class="btn btn-xs btn btn-info">Edit</span></a>
          <a onclick="return confirm('Are you sure you want to delete this User?')" href="delete_savings_plan.php?saving_id=<?php echo $row['id']; ?>"><span class="btn btn-xs btn btn-danger">Delete</span></a>
            </td>
             
        </tr>
            <?php
         }
        ?>
      
    </tbody>
    </table>
</div>
</div>
</div>

</div>

</div>
</div>
</div>
</div>       
</div>
    
<!----------------------------- confirm before delete menu function  ------------------------->
<script>
    function confirmDeletion(e){
        const confirmBeforeDelete = confirm("Are you sure you want to delete this Menu?");
        if(confirmBeforeDelete){
            window.location.href = e.attr("href");
        }
    }
</script>
            <footer class="footer"> © 2023 - Retirement System</footer>
           
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