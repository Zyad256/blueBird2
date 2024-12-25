<?php
// Assuming you have a database connection established
include('db_connection.php');

// Get the package ID from the URL
$package_id = $_GET['id']; // This will get the "id" from the URL query string

$sql = "SELECT * FROM group_packages WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $package_id);  // "s" means string, bind the package name
$stmt->execute();
$result = $stmt->get_result();
$package = $result->fetch_assoc();  // Fetch the result as an associative array

// Check if a result was returned
if ($package) {
    $name = $package['package_name'];
    $description = $package['description'];
    $price = $package['price'];
    $available_spots = $package['available_spots'];
    $image_url = $package['image_url']; // Retrieve the image URL
} else {
    echo "Package not found.";
    exit;
}

?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details</title>
    <link rel="stylesheet" href="CSS/normalize.css">
    <link rel="stylesheet" href="CSS/all.min.css">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/contact.css">
    <link rel="stylesheet" href="CSS/loader.css">
    <link rel="stylesheet" href="CSS/scroll.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>

<body>


    <!-- Header Starts  -->

    <section class="header">
        <a href="home.php" class="logo"><img src="images/birdIcon.jpg" alt="">blueBird</a>

        <nav class="navber">
            <a href="home.php">home</a>
            <a href="about.php">about</a>
            <a href="package.php">package</a>
            <a href="book.php">book</a>
            <a href="login.php"><i class="fa fa-user"></i></a>
        </nav>

        <div id="menu-btn" class="fas fa-bars"></div>
    </section>


    <!-- Header Ends  -->







    <section class="contact">
        <h2>Package Details</h2>
        <div class="contact-container">
            <div class="contact-form">
                <!-- Image -->
                <img src="images/<?php echo htmlspecialchars($image_url); ?>"
                    alt="<?php echo htmlspecialchars($name); ?>">
            </div>

            <!-- Details -->
            <div class=" contact-info">
                <h1 style="font-size: x-large;"><?php echo htmlspecialchars($name); ?></h1><br>
                <p><?php echo htmlspecialchars($description); ?></p>
                <p><strong>Price:</strong> $<?php echo htmlspecialchars($price); ?></p>
                <p><strong>Available Spots:</strong> <?php echo htmlspecialchars($available_spots); ?></p>
                <p>3 nights including breakfast,lunch,transfers</p>
            </div>

        </div>
    </section>





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





    <!-- <audio src="X2Download.app - Yiruma - River Flows in You (128 kbps).mp3" autoplay hidden loop></audio> -->
    <!-- swiper js link -->
    <div class="loader"></div>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="JS/script.js"></script>
    <script src="JS/movement.js"></script>
    <script src="JS/jquery.scrollUP.min.js"></script>


</body>

</html>