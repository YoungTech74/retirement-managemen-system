<?php
$conn = mysqli_connect('localhost', 'root', '', 'retirement_db');
if(!$conn){
    die(mysqli_error($conn));
}

    // testing code that will remove employee from employees list and add to pensioners list when below condition is met l.e: 
    // when an employee date of empployed is one day 

                $sql = "INSERT  INTO pension_list (emp_id, first_name, last_name, phone, email, dob, address, position, pen_amount, password, gender, image, status, date_created)
                SELECT id, first_name, last_name, phone, email, dob, address, position, salary, password, gender, image, status, date_emp FROM employees WHERE date_emp = CURRENT_DATE - INTERVAL 5 DAY AND status = 'Active'";
                $result = mysqli_query($conn, $sql); 
            if ($result) {
           
                mysqli_query($conn, "DELETE FROM employees WHERE date_emp = CURRENT_DATE - INTERVAL 5 DAY");
        }

        

        //------------------- actual code that will be removing employee from employees list and add to pensioners list after 35 years of working with the company------------------------

//         $sql = "INSERT  INTO pension_list (emp_id, first_name, last_name, phone, email, dob, address, position, pen_amount, password, gender, image, status, date_created)
//         SELECT id, first_name, last_name, phone, email, dob, address, position, salary, password, gender, image, status, date_emp FROM employees WHERE date_emp = CURRENT_DATE - INTERVAL 35 YEAR AND status = 'Active'";
//         $result = mysqli_query($conn, $sql); 
//     if ($result) {
   
//         mysqli_query($conn, "DELETE FROM employees WHERE date_emp = CURRENT_DATE - INTERVAL 35 YEAR ");
// }
        ?>