<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Receipt</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            font-size: 16px;
        }
        .receipt-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 30px;
            border: 2px solid #ccc;
            border-radius: 10px;
            background-color: #f9f9f9;
            margin-top: 200px;
            margin-bottom: 200px;
        }
        .receipt-item {
            margin-bottom: 20px;
        }
        .receipt-item strong {
            font-weight: bold;
            font-size: 18px;
        }
        .popup {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            z-index: 9999;
            display: none;
        }
    </style>
</head>
<body>

<div class="popup" id="popup">
    <h2>Booking Successful!</h2>
</div>

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
        
    </div>
</div>

<div class="receipt-container">
    <h2>Booking Receipt</h2>
    <div class="receipt-item">
        <strong>Name:</strong> <?php echo $_GET['name']; ?>
    </div>
    <div class="receipt-item">
        <strong>Phone:</strong> <?php echo $_GET['phone']; ?>
    </div>
    <div class="receipt-item">
        <strong>Date:</strong> <?php echo $_GET['date']; ?>
    </div>
    <div class="receipt-item">
        <strong>Time:</strong> <?php echo $_GET['time']; ?>
    </div>
    <div class="receipt-item">
        <strong>Booking Details:</strong> <?php echo $_GET['booking_details']; ?>
    </div>
    <button onclick="window.print()">Print</button>
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


        <script>
    // Function to show the popup message
    function showPopup() {
        document.getElementById("popup").style.display = "block";
        // Hide the popup after 3 seconds (3000 milliseconds)
        setTimeout(function(){
            document.getElementById("popup").style.display = "none";
        }, 3000);
    }

    // Show popup when the page loads
    window.onload = function() {
        showPopup();
    };
</script>

</body>
</html>
