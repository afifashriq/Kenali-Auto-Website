<?php
// Include database configuration
include 'configs.php';

// Function to sanitize user input
function sanitize_input($input) {
    return htmlspecialchars(stripslashes(trim($input)));
}

// Handle deletion of bookings
if(isset($_GET['delete_id'])) {
    $delete_id = sanitize_input($_GET['delete_id']);
    $sql_delete = "DELETE FROM bookings WHERE id = '$delete_id'";
    if ($mysqli->query($sql_delete) === TRUE) {
        // Booking deleted successfully
        // You can redirect to admin.php or display a success message
        header("Location: admin.php");
        exit;
    } else {
        echo "Error deleting record: " . $mysqli->error;
    }
}

// Retrieve all bookings from the database
$sql_select = "SELECT * FROM bookings";
$result = $mysqli->query($sql_select);
?>


<?php
// Close database connection
$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Now | Kenali Auto</title>
    <link rel="stylesheet" href="style.css"> <!-- Assuming same CSS file is used -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Manage Bookings</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f3f3f3;
        }
        .containers {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #000;
        }
        tr:hover {
            background-color: #f9f9f9;
        }
        .delete-link {
            color: #ff0000;
            text-decoration: none;
        }
        .delete-link:hover {
            text-decoration: underline;
        }
        .search-form {
            margin-bottom: 20px;
            text-align: center;
        }
        .search-input {
            padding: 8px;
            width: 60%;
            border-radius: 4px;
            border: 1px solid #ccc;
            margin-right: 10px;
        }
        .search-button {
            padding: 8px 16px;
            background-color: #000;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>

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



    <div class="containers">
    <h2>Admin Panel - Manage Bookings</h2>

    <!-- Search form -->
    <form action="" method="GET" class="search-form">
        <input type="text" name="search" class="search-input" placeholder="Search by ID">
        <button type="submit" class="search-button">Search</button>
    </form>

    <!-- Table to display bookings -->
    <table class="table">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Date</th>
            <th>Time</th>
            <th>Booking Details</th>
            <th>Action</th>
        </tr>
        <?php
        include 'configs.php';

        // Search functionality
        $search = '';
        if(isset($_GET['search'])){
            $search = $_GET['search'];
            $sql = "SELECT * FROM bookings WHERE id = '$search'";
        } else {
            $sql = "SELECT * FROM bookings";
        }

        $result = $mysqli->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><?php echo $row['date']; ?></td>
                    <td><?php echo $row['time']; ?></td>
                    <td><?php echo $row['booking_details']; ?></td>
                    <td>
                        <a href="edit_booking.php?id=<?php echo $row['id']; ?>" class="edit-link">Edit</a>
                        <a href="admin.php?delete_id=<?php echo $row['id']; ?>" class="delete-link" onclick="return confirm('Are you sure you want to delete this booking?')">Delete</a>
                    </td>
                </tr>
                <?php
            }
        } else {
            echo "<tr><td colspan='7'>No bookings found</td></tr>";
        }
        ?>
    </table>


</div>

<!-------- featured categories --------->
<div class="categories">
        <div class="small-container">
            <div class="row">
                <div class="col-3">
                    <img src="images/camry.png">
                </div>
                <div class="col-3">
                    <img src="images/fortuner1.png">
                </div>
                <div class="col-3">
                    <img src="images/yaris.png">
                </div>
            </div>
        </div>
    </div>



    <div class="containers">
    <h2>Add Booking</h2>
    <form action="process_admin.php" method="post">
        <div class="background">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required>
 
            <label for="phone">Phone Number:</label>
            <input type="text" name="phone" id="phone" required>
           
            <label for="booking_details">Booking Details:</label>
            <input type="text" name="booking_details" id="booking_details" required>
           
            <label for="date">Date:</label>
            <input type="date" name="date" id="date" required>
               
            <label for="time">Time:</label>
            <input type="time" name="time" id="time" required>

            <input type="submit" value="Submit">
        </form>
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

</body>
</html>
