<?php


$connection = mysqli_connect('localhost','root','','bluebird',3306);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $location = mysqli_real_escape_string($connection, $_POST['location']);

    // Fetch the amount based on the location
    $query = "SELECT price FROM group_packages WHERE package_name = '$location'";
    $result = mysqli_query($connection, $query);

    // Check if a matching record is found
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $amount = $row['price'];
    } else {
        $amount = "Location not found.";
    }
} else {
   
    header('Location: book.php');
    exit();
}
?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>book</title>
    <link rel="stylesheet" href="CSS/normalize.css">
    <link rel="stylesheet" href="CSS/all.min.css">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/loader.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

</head>

<body>

    <!-- Header Start  -->

    <section class="header">
        <a href="home.php" class="logo"><img src="images/birdIcon.jpg" alt="" width="20px" height="20px">blueBird</a>

        <nav class="navber">
            <a href="home.php">home</a>
            <a href="about.php">about</a>
            <a href="package.php">package</a>
            <a href="book.php">book</a>
            <a href="login.php"><i class="fa fa-user"></i></a>
        </nav>

        <div id="menu-btn" class="fas fa-bars"></div>
    </section>


    <!-- Header End  -->

    <div class="heading" style="background: url(images/mountain.jpg) no-repeat">
        <h1>book now</h1>
    </div>


    <!-- booking starts -->

    <section class="booking">

        <h1 class="headingtitle">Payment Details</h1>

        <form action="process_payment.php" method="post" class="book-form">

            <div class="flex">

                <div class="inputBox">
                    <span for="payment_method">Payment Method:</span>
                    <input type="search" name="payment_method" id="payment_method" list="suggestions" required>
                    <datalist id="suggestions">
                        <option value="Credit Card">
                        <option value="PayPal">
                    </datalist>
                </div>

                <div class="inputBox">
                    <span for="amount">Amount:</span>
                    <input type="text" id="amount" name="amount" readonly
                        value="<?php echo htmlspecialchars($amount); ?>">
                </div>

                <input type="hidden" name="location" value="<?php echo htmlspecialchars($location); ?>">


                <p style="margin-left: 570px;font-size:medium;margin-top:20px;text-transform :none;">2 of 2</p>
                <button type="submit" class="btn">Pay Now</button>
            </div>
        </form>

    </section>




    <!-- booking ends -->










    <!-- footer section Start -->

    <section class="footer">

        <div class="box-container">

            <div class="box">
                <h3>quick links</h3>
                <a href="home.php"><i class="fas fa-angle-right"></i> home</a>
                <a href="about.php"><i class="fas fa-angle-right"></i>about</a>
                <a href="package.php"><i class="fas fa-angle-right"></i>package</a>
                <a href="book.php"><i class="fas fa-angle-right"></i>book</a>
            </div>

            <div class="box">
                <h3>extra links</h3>
                <a href="#"><i class="fas fa-angle-right"></i> ask questions</a>
                <a href="#"><i class="fas fa-angle-right"></i> about us</a>
                <a href="#"><i class="fas fa-angle-right"></i> privacy polices</a>
                <a href="#"><i class="fas fa-angle-right"></i> terms of use</a>
            </div>

            <div class="box">
                <h3>contact info</h3>
                <a href="#"><i class="fas fa-phone"></i> +123-456-789</a>
                <a href="#"><i class="fas fa-phone"></i> +111-222-3333</a>
                <a href="#"><i class="fas fa-envelope"></i> ziadghost550@gmail.com</a>
                <a href="#"><i class="fas fa-map"></i> cairo, Egypt</a>
            </div>

            <div class="box">
                <h3>follow us</h3>
                <a href="#"><i class="fab fa-facebook"></i> facebook</a>
                <a href="#"><i class="fab fa-youtube"></i> youtube</a>
                <a href="#"><i class="fab fa-instagram"></i> instagram</a>
                <a href="#"><i class="fab fa-twitter"></i> twitter</a>
            </div>
        </div>

        <div class="credit">created by <span>ziadghost550</span> | all rights reserved &#xA9; </div>
    </section>

    <!-- footer section End -->





    <audio src="X2Download.app - Yiruma - River Flows in You (128 kbps).mp3" autoplay hidden loop></audio>
    <!-- swiper js link -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="JS/script.js"></script>
    <script src="JS/movement.js"></script>
</body>

</html>