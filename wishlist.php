<?php
session_start();
include('db_connection.php');


$user_id = $_SESSION['user_id'];


$user_query = "SELECT * FROM users WHERE id = '$user_id'";
$user_result = mysqli_query($conn, $user_query);
$user = mysqli_fetch_assoc($user_result);

$whishlist_query = "SELECT whishlist.id as wishlist_id, group_packages.* FROM whishlist LEFT JOIN group_packages ON group_packages.id = whishlist.package_id WHERE whishlist.user_id = '$user_id'";
                  

$whishlist_result = mysqli_query($conn, $whishlist_query);
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
            <a href="wishlist.php" style="text-decoration: none !important;">Wishlist</a>

        </nav>
    </div>







    <div class="profile-container">

        <div class="wishlist-history">
            <h1>Wishlist</h1>
            <?php if (mysqli_num_rows($whishlist_result) > 0): ?>
            <?php while ($whishlist = mysqli_fetch_assoc($whishlist_result)): ?>
            <div class="wishlist">
                <img src="images/<?php echo $whishlist['image_url']; ?>"
                    alt="<?php echo $whishlist['package_name']; ?>">
                <h3><?php echo $whishlist['package_name']; ?></h3>
                <p><?php echo $whishlist['description']; ?></p>
                <p>Price: $<?php echo $whishlist['price']; ?></p>
                <p>Available Spots: <?php echo $whishlist['available_spots']; ?></p>
                <br>
            </div>
            <?php endwhile; ?>
            <?php else: ?>
            <p>No items in your wishlist.</p>
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
    <a class="gotopbtn" href="#"><i class="fa fa-angle-up"></i></a>
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