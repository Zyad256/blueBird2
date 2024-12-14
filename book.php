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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    
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
        <a href="login.php"><i class = "fa fa-user"></i></a>
    </nav>

    <div id="menu-btn" class="fas fa-bars"></div>
</section>


        <!-- Header End  -->

    <div class="heading" style="background: url(images/mountain.jpg) no-repeat">
        <h1>book now</h1>
    </div>

        
    <!-- booking starts -->

     <section class="booking">

         <h1 class="headingtitle">book your trip!</h1>

         <form action="book_form.php" method="post" class="book-form">
                   
                <div class="flex">

                    <div class="inputBox">
                        <span>name :</span>
                        <input type="text" placeholder="enter your name" name="name">
                    </div>

                    <div class="inputBox">
                        <span>email :</span>
                        <input type="email" placeholder="enter your email" name="email">
                    </div>

                    <div class="inputBox">
                        <span>phone :</span>
                        <input type="number" placeholder="enter your number" name="phone">
                    </div>

                    <div class="inputBox">
                        <span>address :</span>
                        <input type="text" placeholder="enter your address" name="address">
                    </div>

                    <div class="inputBox">
                        <span>where to :</span>
                        <input type="search" id="search" name="location" placeholder="Search..." list="suggestions">
                           <datalist id="suggestions">
                            <option value="St. Lucia">
                            <option value="Maui">
                            <option value="paris">
                            <option value="rome">
                            <option value="Phuket">
                            <option value="london">
                            <option value="maldives">
                            <option value="tokyo">
                            <option value="costa rica">
                            <option value="amsterdam">
                            <option value="barcelona">
                            <option value="sydney">
                            <option value="dubai">
                            <option value="new york city">
                            <option value="bali">
                          </datalist>
                    </div>

                    <div class="inputBox">
                        <span>how many Guests:</span>
                        <input type="text" placeholder="number of guests" name="guests">
                    </div>

                    <div class="inputBox">
                        <span>arrivals :</span>
                        <input type="date"  name="arrivals">
                    </div>

                    <div class="inputBox">
                        <span>departure :</span>
                        <input type="date"  name="leaving">
                    </div>


             <!-- <input type="hidden" name="booking_id" value="<?php echo $_GET['booking_id']; ?>">
            <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>"> -->
          
            <div class="inputBox">
                <span>Payment Method</span>
                <select name="payment_method" id="payment_method" required>
                    <option value="Credit Card">Credit Card</option>
                    <option value="PayPal">PayPal</option>
                </select>
            </div>

            <div class="inputBox">
                <span for="amount">Amount</span>
                <input type="text" id="amount" name="amount" readonly value="<?php echo $_GET['amount']; ?>">
            </div>

                </div>
               
                <input type="submit" value="submit" class="btn" name="send">

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





        <!-- <audio src="X2Download.app - Yiruma - River Flows in You (128 kbps).mp3" autoplay hidden loop></audio> -->
    <!-- swiper js link -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="JS/script.js"></script>
    <script src="JS/movement.js"></script>
</body>
</html>