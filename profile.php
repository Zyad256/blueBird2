<?php
session_start();
include('db_connection.php');  


// $user_id = $_SESSION[1];
$user_id = 1;

$user_query = "SELECT * FROM users WHERE id = '$user_id'";
$user_result = mysqli_query($conn, $user_query);
$user = mysqli_fetch_assoc($user_result);


$booking_query = "SELECT * FROM bookings WHERE user_id = '$user_id'";
$booking_result = mysqli_query($conn, $booking_query);


$package_query = "SELECT * FROM packages";
$package_result = mysqli_query($conn, $package_query);

$sql = "SELECT b.id AS booking_id, d.name AS destination, p.name AS package_name, b.guests, b.arrival_date, b.leaving_date, pay.amount, pay.payment_method, pay.status
        FROM bookings b
        LEFT JOIN packages p ON b.package_id = p.id
        LEFT JOIN destinations d ON p.destination_id = d.id
        LEFT JOIN payment pay ON b.id = pay.booking_id
        WHERE b.user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $_SESSION['$user_id']);
$stmt->execute();
$result = $stmt->get_result();

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
    <link rel="stylesheet" href="CSS/loader.css">
    <link rel="stylesheet" href="CSS/scroll.css">
    <link rel="stylesheet" href="CSS/profile.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
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
        <a href="profile.php"><i class = "fa fa-user"></i></a>
    </nav>

    <div id="menu-btn" class="fas fa-bars"></div>
</section>


        <!-- Header Ends  -->


    <div class="profile-container">
        <h1>Welcome, <?php echo $user['name']; ?>!</h1>
        
     
        <div class="profile-info">
            <h2>Your Information</h2>
            <p>Email: <?php echo $user['email']; ?></p>
            <p>Phone: <?php echo $user['phone']; ?></p>
            <p>Address: <?php echo $user['address']; ?></p>
        </div>

        <div class="booking-history">
            <h2>Your Booking History</h2>
            <?php if (mysqli_num_rows($booking_result) > 0): ?>
                <?php while ($booking = mysqli_fetch_assoc($booking_result)): ?>
                    <div class="booking">
                        <h3>Package: <?php echo $booking['package_id']; ?></h3>
                        <p>Guests: <?php echo $booking['guests']; ?></p>
                        <p>Arrival Date: <?php echo $booking['arrival_date']; ?></p>
                        <p>Leaving Date: <?php echo $booking['leaving_date']; ?></p>
                        <p>Created At: <?php echo $booking['created_at']; ?></p>
                        <?php 
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>{$row['destination']}</td>";
                            echo "<td>{$row['package_name']}</td>";
                            echo "<td>{$row['guests']}</td>";
                            echo "<td>{$row['arrival_date']}</td>";
                            echo "<td>{$row['leaving_date']}</td>";
                            echo "<td>{$row['payment_method']}</td>";
                            echo "<td>{$row['amount']}</td>";
                            echo "<td>{$row['status']}</td>";
                            echo "</tr>";
                        }
                        ?>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p>No bookings yet.</p>
            <?php endif; ?>
        </div>

        <!-- Available Packages -->
        <div class="packages">
            <h2>Available Packages</h2>
            <?php while ($package = mysqli_fetch_assoc($package_result)): ?>
                <?php
                // Fetch the destination details for each package
                $destination_id = $package['destination_id'];
                $destination_query = "SELECT * FROM destinations WHERE id = '$destination_id'";
                $destination_result = mysqli_query($conn, $destination_query);
                $destination = mysqli_fetch_assoc($destination_result);
                ?>
                <div class="package">
                    <h3>Package: <?php echo $package['name']; ?></h3>
                    <p>Destination: <?php echo $destination['name']; ?></p>
                    <p>Price: $<?php echo $package['price']; ?></p>
                    <p>Details: <?php echo $package['details']; ?></p>
                    <p>Description: <?php echo $destination['description']; ?></p>
                    <img src="<?php echo $destination['image_url']; ?>" alt="<?php echo $destination['name']; ?>" width="200">
                </div>
            <?php endwhile; ?>
        </div>
    </div>





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







<?php
// Close the database connection
mysqli_close($conn);
?>


