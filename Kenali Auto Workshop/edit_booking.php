<?php
// Include database configuration
include 'configs.php';

// Retrieve booking details by ID
if(isset($_GET['id'])) {
    $id = sanitize_input($_GET['id']);
    $sql_select = "SELECT * FROM bookings WHERE id = '$id'";
    $result = $mysqli->query($sql_select);
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
    } else {
        echo "Booking not found.";
        exit;
    }
}

// Function to sanitize user input
function sanitize_input($input) {
    return htmlspecialchars(stripslashes(trim($input)));
}
?>

<!DOCTYPE html>
<html lang="en">
<div class="header">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width, initial-scale=1.0">
    <title>Admin Panel | Booking</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .containers {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 100px;
        }
    </style>
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
</div>

    <!-- Form to edit booking details -->
<div class="containers">
    <h2>Edit Booking</h2>
    <form action="update_booking.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="<?php echo $row['name']; ?>" required>
        
        <label for="phone">Phone Number:</label>
        <input type="text" name="phone" id="phone" value="<?php echo $row['phone']; ?>" required>
        
        <label for="date">Date:</label>
        <input type="date" name="date" id="date" value="<?php echo $row['date']; ?>" required>
        
        <label for="time">Time:</label>
        <input type="time" name="time" id="time" value="<?php echo $row['time']; ?>" required>
        
        <label for="booking_details">Booking Details:</label>
        <input type="text" name="booking_details" id="booking_details" value="<?php echo $row['booking_details']; ?>" required>

        <input type="submit" value="Update">
    </form>
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

</body>
</html>
