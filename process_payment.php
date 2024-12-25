<?php

$connection = mysqli_connect('localhost', 'root', '', 'bluebird', 3306);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve payment details
    $location = mysqli_real_escape_string($connection, $_POST['location']);
    $payment_method = mysqli_real_escape_string($connection, $_POST['payment_method']);
    $amount = mysqli_real_escape_string($connection, $_POST['amount']);

    $query = "UPDATE book_form SET Payment_method = '$payment_method', Amount = '$amount' WHERE location = '$location'";
    $result = mysqli_query($connection, $query);

    if ($result) {
           echo "Payment processed successfully!";
             header('refresh:3;url= home.php');
    } else {
        echo "Error processing payment: " . mysqli_error($connection);
    }
} else {
    // Redirect back if accessed directly
    header('Location: book.php');
    exit();
}
?>