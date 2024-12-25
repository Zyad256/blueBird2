<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/form.css">
    <!--    Render all elements normally -->
    <link rel="stylesheet" href="CSS/normalize.css">
    <!-- icons  -->
    <link rel="stylesheet" href="CSS/all.min.css">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Work+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <title>Sign Up</title>
</head>

<body>
    <div class="wrapper">
        <h1>Log in</h1>

        <form action="" method="post">

            <div class="box-input">
                <input type="text" required placeholder="Username" name="Username">
                <i class="fa-solid fa-user"></i>
            </div>

            <div class="box-input">
                <input type="password" required minlength="8" placeholder="Password" name="Password">
                <i class="fa-solid fa-lock"></i>
            </div>

            <div class="box-input">
                <input type="email" required placeholder="Email" name="Email">
                <i class="fa-solid fa-envelope"></i>
            </div>

            <div class="box-input">
                <input type="number" required placeholder="Phone" name="Phone">
                <i class="fa-solid fa-phone"></i>
            </div>

            <div class="box-input">
                <input type="text" required placeholder="Address" name="Address">
                <i class="fa-solid fa-map"></i>
            </div>

            <button type="submit" class="Log-button" name="SignUP">Sign Up</button>


        </form>
    </div>

</body>

</html>

<?php 

include 'db_connection.php';
if(isset($_POST['SignUP'])){
     $name = $_POST['Username'];
     $password = $_POST['Password'];
     $email = $_POST['Email'];
     $phone = $_POST['Phone'];
     $address = $_POST['Address'];
     
     $request = "insert into users(name,password,email,phone,address,created_at) values('$name','$password','$email','$phone','$address',NOW())";
     mysqli_query($conn,$request);
     header('location: login.php ');
}

?>