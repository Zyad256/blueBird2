<?php
session_start();
include('db_connection.php');




$user_id = $_SESSION['user_id'];


$user_query = "SELECT * FROM users WHERE id = '$user_id'";
$user_result = mysqli_query($conn, $user_query);
$user = mysqli_fetch_assoc($user_result);

$email = mysqli_real_escape_string($conn, $user['email']);

// Perform an INNER JOIN to get only matching emails
$booking_query = "SELECT DISTINCT book_form.* 
                  FROM book_form 
                  INNER JOIN users ON book_form.email = users.email
                  WHERE book_form.email = '$email'";

$booking_result = mysqli_query($conn, $booking_query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="CSS/normalize.css">
    <link rel="stylesheet" href="CSS/all.min.css">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/profile.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>

<body>

    <!-- Header Section Starts -->

    <section class="header">
        <a href="home.php" class="logo"><img src="images/birdIcon.jpg" alt="">blueBird</a>

        <nav class="navber">
            <a href="home.php">home</a>
            <a href="about.php">about</a>
            <a href="package.php">package</a>
            <a href="book.php">book</a>
            <a href="profile.php"><i class="fa fa-user"></i></a>
        </nav>

        <div id="menu-btn" class="fas fa-bars"></div>




    </section>

    <div class="header-2">
        <nav class="navbar">
            <a href="profile.php" style="text-decoration: none !important;">home</a>
            <a href="#" style="text-decoration: none !important;">Contacts</a>
            <a href="history.php" style="text-decoration: none !important;">History</a>
            <a href="wishlist.php" style="text-decoration: none !important;">Whislist</a>

        </nav>
    </div>






    <div class="profile-container">
        <div class="booking-history">
            <h2>Booking History</h2>
            <?php if (mysqli_num_rows($booking_result ) > 0): ?>
            <?php while ($booking = mysqli_fetch_assoc($booking_result )): ?>
            <div class="booking">
                <h3>Package: <?php echo $booking['location']; ?></h3>
                <p>Destination: <?php echo $booking['address']; ?></p>
                <p>Guests: <?php echo $booking['guest']; ?></p>
                <p>Arrival Date: <?php echo $booking['arrival']; ?></p>
                <p>Leaving Date: <?php echo $booking['leaving']; ?></p>
                <p>Payment Method: <?php echo $booking['Payment_method']; ?></p>
                <p>Amount: $<?php echo $booking['Amount']; ?></p>
                <!-- <p>Status: <?php echo $booking['status']; ?></p> -->
            </div>
            <?php endwhile; ?>
            <?php else: ?>
            <p>No bookings yet.</p>
            <?php endif; ?>
        </div>
    </div>




    <!-- Footer Section Start -->

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
                <h3>contact info</h3>
                <a href="#"><i class="fas fa-phone"></i> +123-456-789</a>
                <a href="#"><i class="fas fa-envelope"></i> ziadghost550@gmail.com</a>
                <a href="#"><i class="fas fa-map"></i> Cairo, Egypt</a>
            </div>
        </div>
    </section>

    <!-- Footer Section End -->

    <div class="loader"></div>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="JS/script.js"></script>
    <script src="JS/movement.js"></script>
    <script src="JS/jquery.scrollUP.min.js"></script>
</body>

</html>

<?php
// Close the database connection
mysqli_close($conn);
?>