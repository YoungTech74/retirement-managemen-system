<?php
// session_start();
$conn = mysqli_connect('localhost', 'root', '', 'retirement_db');
if(!$conn){
    die(mysqli_error($conn));
}

        //--------------------------------- actual code of being 25years in service------------------------ 
        $check_25_yrs = mysqli_query($conn, "SELECT * FROM employees WHERE date_emp = CURRENT_DATE - INTERVAL 25 YEAR");
       

        $message_25yrs = 'Hello esteemed worker, we appreciate your work so far in this company, and we don\"t take it for granted.
            We\"d like to inform you that you have spent 25 years in service, and this is to notify you that
            your retirement will be due in 10 years and your savings plan would be terminated when retirement is due.'.'<br>'.'
            Thank you and have a lovely day!';

        if(mysqli_num_rows($check_25_yrs) > 0){
              mysqli_query($conn, "INSERT  INTO emp_inbox (emp_id, message, un_read_msg, inbox_count, date_created)
              SELECT id, '$message_25yrs', 1, 1, current_timestamp() FROM employees WHERE date_emp = CURRENT_DATE - INTERVAL 25 YEAR AND status = 'Active'");
                    
        }


            //------------------------------------ testing code of being 25years in service----------------------------------

             $check_25_yrs = mysqli_query($conn, "SELECT * FROM employees WHERE date_emp = CURRENT_DATE - INTERVAL 2 DAY AND status = 'Active' ");
       

            $message_25yrs = 'Hello esteemed worker, we appreciate your work so far in this company, and we don\"t take it for granted.
                We\"d like to inform you that you have spent 25 years in service, and this is to notify you that
                your retirement will be due in 10 years and your savings plan would be terminated when retirement is due.'.'<br>'.'
                Thank you and have a lovely day!';

                if(mysqli_num_rows($check_25_yrs) > 0){

                    mysqli_query($conn, "INSERT  INTO emp_inbox (emp_id, message, un_read_msg, inbox_count, date_created)
                    SELECT id, '$message_25yrs', 1, 1, current_timestamp() FROM employees WHERE date_emp = CURRENT_DATE - INTERVAL 2 DAY AND status = 'Active'");
                    
                }





            //------------------------------------ actual code of being 30 years in service ----------------------------------

            $check_for_30yrs = mysqli_query($conn, "SELECT * FROM employees WHERE date_emp = CURRENT_DATE - INTERVAL 30 YEAR AND status = 'Active'");
       

            $message_30yrs = 'Hello esteemed worker, we appreciate your work so far in this company, and we don\"t take it for granted.
                We\"d like to inform you that you have spent 30 years in service, and this is to notify you that
                your retirement will be due in 5 years and your savings plan would be terminated when retirement is due.'.'<br>'.'
                Thank you and have a lovely day!';

                if(mysqli_num_rows($check_for_30yrs) > 0){

                    mysqli_query($conn, "INSERT  INTO emp_inbox (emp_id, message, un_read_msg, inbox_count, date_created)
                    SELECT id, '$message_30yrs', 1, 1, current_timestamp() FROM employees WHERE date_emp = CURRENT_DATE - INTERVAL 30 YEAR AND status = 'Active'");
                    
                }


            //------------------------------------ testing code of being 30 years in service ----------------------------------

            $check_for_30yrs = mysqli_query($conn, "SELECT * FROM employees WHERE date_emp = CURRENT_DATE - INTERVAL 3 DAY AND status = 'Active'");
       

            $message_30yrs = 'Hello esteemed worker, we appreciate your work so far in this company, and we don\"t take it for granted.
                We\"d like to inform you that you have spent 30 years in service, and this is to notify you that
                your retirement will be due in 5 years and your savings plan would be terminated when retirement is due.'.'<br>'.'
                Thank you and have a lovely day!';

                if(mysqli_num_rows($check_for_30yrs) > 0){

                    mysqli_query($conn, "INSERT  INTO emp_inbox (emp_id, message, un_read_msg, inbox_count, date_created)
                    SELECT id, '$message_30yrs', 1, 1, current_timestamp() FROM employees WHERE date_emp = CURRENT_DATE - INTERVAL 3 DAY AND status = 'Active'");
                    
                }







                   //------------------------------------ actual code of being 35 years in service ----------------------------------

            $check_for_35yrs = mysqli_query($conn, "SELECT * FROM employees WHERE date_emp = CURRENT_DATE - INTERVAL 364 DAY AND status = 'Active'");
       

            $message_35yrs = 'Hello esteemed worker, we appreciate your work so far in this company, and we don\"t take it for granted.
                We\"d like to inform you that you have spent 35 years in service, and this is to notify you that
                your retirement will be due tomorrow and your savings plan would be terminated when retirement is due.'.'<br>'.'
                Thank you and have a lovely day!';

                if(mysqli_num_rows($check_for_35yrs) > 0){

                    mysqli_query($conn, "INSERT  INTO emp_inbox (emp_id, message, un_read_msg, inbox_count, date_created)
                    SELECT id, '$message_35yrs', 1, 1, current_timestamp() FROM employees WHERE date_emp = CURRENT_DATE - INTERVAL 364 DAY AND status = 'Active'");
                    
                }



                
            //------------------------------------ testing code of being 35 years in service ----------------------------------

            $check_for_35yrs = mysqli_query($conn, "SELECT * FROM employees WHERE date_emp = CURRENT_DATE - INTERVAL 4 DAY AND status = 'Active'");
       

            $message_35yrs = 'Hello esteemed worker, we appreciate your work so far in this company, and we don\"t take it for granted.
                We\"d like to inform you that you have spent 35 years in service, and this is to notify you that
                your retirement will be due tomorrow and your savings plan would be terminated when retirement is due.'.'<br>'.'
                Thank you and have a lovely day!';

                if(mysqli_num_rows($check_for_35yrs) > 0){

                    mysqli_query($conn, "INSERT  INTO emp_inbox (emp_id, message, un_read_msg, inbox_count, date_created)
                    SELECT id, '$message_35yrs', 1, 1, current_timestamp() FROM employees WHERE date_emp = CURRENT_DATE - INTERVAL 4 DAY AND status = 'Active'");
                    
                }

        ?>