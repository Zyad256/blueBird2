<?php

      error_reporting(E_ALL);
      ini_set('display_errors', 1);

       $connection = mysqli_connect('localhost','root','','bluebird',3306);

       if(isset($_POST['send'])){   
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $location = $_POST['location'];
            $guests = $_POST['guests'];
            $arrivals = $_POST['arrivals'];
            $leaving = $_POST['leaving'];

            $request = "insert into book_form(name,email,phone,address,location,guest,arrival,leaving)
             values('$name','$email','$phone','$address','$location','$guests','$arrivals','$leaving')";
       
             mysqli_query($connection,$request);

             if (mysqli_query($connection, $request)) {
               header('Location: home.php');
               exit();
           } else {
               echo "Error: " . mysqli_error($connection);
           }
           }       
            else{
               echo "something went wrong try again";
            }
?>