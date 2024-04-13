
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Kenali Auto</title>
</head>
<body>

    <?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "futura_ecommerce";
    
    // Create a connection
    $conn = new mysqli($host, $username, $password, $database);
    
    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    echo "";
    ?>
</body>

<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width, initial-scale=1.0">
    <title>Futura | Ecommerce Website Design</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="header">
    <div class="container">
        <div class="navbar">
            <div class="logo">
                <a href="index.php"><img src="images/kenalilogo.jpg" width="125px"></a>
            </div>
            <nav>
                <ul id="MenuItems">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="booking.php">Book Now!</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="contact.html">Contact</a></li>
                    <li><a href="account.html">User Manual</a></li>
                    <li><a href="admin_login.php">Admin</a></li>
                </ul>
            </nav>
            <a href="products.php"><img src="images/cart.png" width="30px" height="30px"></a>
            <img src="images/menu.png" class="menu-icon" onclick="menutoggle()">
        </div>
        <div class="row">
            <div class="col-2">
                <h1>Get The Best<br>Car Service!</h1>
                <p>Success isn't always about greatness. It's about consistency. Consistent<br>hard work gains success. Greatness will come.</p>
                <a href="booking.php" class="btn">Book Now &#8594;</a>
            </div>
            <div class="col-2">
                <img src="images/fortuner1.png">
            </div>
        </div>
    </div>
</div>

<!-------- featured categories --------->
    <div class="categories">
        <div class="small-container">
            <div class="row">
                <div class="col-3">
                    <img src="images/toyota.jpg">
                </div>
                <div class="col-3">
                    <img src="images/yaris.jpg">
                </div>
                <div class="col-3">
                    <img src="images/innova.jpg">
                </div>
            </div>
        </div>
    </div>
    
    <div class="offer">
            <div class="small-container">
                <div class="row">
                    <div class="col-2">
                        <img src="images/camry.png" class="offer-img">
                    </div>
                    <div class="col-2">
                        <p>Exclusive Availabe on Kenali Auto</p>
                        <h1>Check It Out!</h1>
                        <p>We provides the best spare parts selling in market now!</p>
                        <a href="products.php" class="btn">Explore Now &#8594;</a>
                    </div>
                </div>
            </div>
        </div>

<!------- testimonial -------->
<div class="testimonial">
            <div class="small-container">
                <div class="row">
                    <div class="col-3">
                        <i class="fa fa-quote-left"></i>
                        <p>I love your website's design so much !</p>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                        </div>
                        <img src="images/user-1.png">
                        <h3>Siti</h3>
                    </div>
                    <div class="col-3">
                        <i class="fa fa-quote-left"></i>
                        <p>the shopping cart is simple but sooo user friedly</p>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                        </div>
                        <img src="images/user-2.png">
                        <h3>Johan</h3>
                    </div>
                    <div class="col-3">
                        <i class="fa fa-quote-left"></i>
                        <p>Your website really does make it easier to book!</p>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                        </div>
                        <img src="images/user-3.png">
                        <h3>Senah</h3>
                    </div>
                </div>
            </div>
        </div>

    <!------------- brands --------->
        <div class="brands">
            <div class="small-container">
                <div class="row">
                    <div class="col-5">
                        <img src="images/logo-godrej.png">
                    </div>
                    <div class="col-5">
                        <img src="images/logo-oppo.png">
                    </div>
                    <div class="col-5">
                        <img src="images/logo-coca-cola.png">
                    </div>
                    <div class="col-5">
                        <img src="images/logo-paypal.png">
                    </div>
                    <div class="col-5">
                        <img src="images/logo-philips.png">
                    </div>
                </div>
            </div>
        </div>

    <!--------- footer ------->

        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="footer-col-1">
                        <h3>Download Our App</h3>
                        <p>Download App for Android and Ios mobile phone</p>
                        <div class="app-logo">
                            <img src="images/play-store.png">
                            <img src="images/app-store.png">
                        </div>
                    </div>
                    <div class="footer-col-2">
                        <img src="images/kenalilogo.jpg">
                        <p>Our Purpose Is Sustainably Make the Pleasure and
                        Benefits of Workshop Accessible to the Many.</p>
                    </div>
                    <div class="footer-col-3">
                        <h3>Useful Links</h3>
                        <ul>
                            <li>Coupons</li>
                            <li>Blog Post</li>
                            <li>Return Policy</li>
                            <li>Join Affiliate</li>
                        </ul>
                    </div>
                    <div class="footer-col-4">
                        <h3>Follow Us</h3>
                        <ul>
                            <li><a href="https://www.tiktok.com/@futuraband">Tiktok</a></li>
                            <li><a href="https://twitter.com/futurabandmy">Twitter</a></li>
                            <li><a href="https://www.instagram.com/futurabandmy">Instagram</a></li>
                            <li><a href="https://www.youtube.com/@futurabandmy">Youtube</a></li>
                        </ul>
                    </div>
                    
                </div>
                <hr>
                <p class="copyright">Copyright 2023 - Kenali Auto</p>
            </div>
        </div>
<!----------js for toggle menu---------->
        <script>
            var MenuItems = document.getElementById("MenuItems");

            MenuItems.style.maxHeight = "0px";

            function menutoggle(){
                if( MenuItems.style.maxHeight == "0px")
                {
                    MenuItems.style.maxHeight = "200px";
                }
                else
                {
                    MenuItems.style.maxHeight = "0px";
                }
            }
        </script>
        <script scr="app.js"></script>

</body>
</html>







