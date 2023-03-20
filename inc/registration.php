<?php
include 'dbconnect.php';  
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $first_name = stripslashes($_POST['first_name']);
        $first_name = mysqli_real_escape_string($dbconn, $first_name);
        $last_name = stripslashes($_POST['last_name']);
        $last_name = mysqli_real_escape_string($dbconn, $last_name);
        $email = stripslashes($_POST['email']);
        $email = mysqli_real_escape_string($dbconn, $email);
        $phone = stripslashes($_POST['phone']);
        $phone = mysqli_real_escape_string($dbconn, $phone);

        //checking our varaibles to see if they are empty
         if (empty($first_name && $last_name && $email && $phone)) {
               ?>
                    <script>
                        window.location = 'inc/errors.html';
                    </script>
               <?php
             } else {
                 # if not empty our variables then our sql should proceed !!
            $Q_reg = "INSERT INTO `customer_data` (`first_name`, `last_name`, `email`, `phone`) 
            VALUES ('$first_name', '$last_name', '$email', '$phone')";
            $result = @mysqli_query($dbconn, $Q_reg);
            if (!$result) {
                # checking if result does not contain data as i should
                ?>
                    <h5>An Errorr occured</h5>
                    <script>
                        window.location = 'inc/errors.html';
                    </script>
                <?php
            }else {
                # redirect our home page is there is no problem
               ?>
               <script>
                    window.location = 'login.php';
               </script>
               <?php

           }
              
            }
        }
        ?>