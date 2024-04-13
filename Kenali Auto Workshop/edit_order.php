<?php
// Include config.php to establish a database connection
include 'config.php';

// Initialize variables
$id = 'id';
$name = 'name';
$email = 'email';
$phone = 'phone';
$address = 'address';

// Check if an order ID is provided
if(isset($_POST['id'])) {
    // Sanitize the input
    $id = mysqli_real_escape_string($conn, $_POST['id']);

    // Fetch order details from the database based on the provided ID
    $stmt = $conn->prepare('SELECT * FROM orders WHERE id = ?');
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();

    // If order found, fetch its details
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $email = $row['email'];
        $phone = $row['phone'];
        $address = $row['address'];
    } else {
        echo "Order not found.";
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<<div class="header">
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
        .edit {
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
    <!-- Create a form to edit order details -->
    <div class="edit">
    <h2>Edit Orders</h2>
    <form method="post" action="update_order.php">
        
        <input type="hidden" name="id" value="<?= $id ?>">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="<?= $name ?>" required>
        
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?= $email ?>" required>
        
        <label for="phone">Phone:</label>
        <input type="text" name="phone" id="phone" value="<?= $phone ?>" required>
        
        <label for="address">Address:</label>
        <input type="text" name="address" id="address" value="<?= $address ?>" required>
        
        <button type="submit">Update</button>
    </form>

</body>
</html>
