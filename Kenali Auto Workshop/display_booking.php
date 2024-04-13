<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .booking-receipt {
            width: 80%;
            margin: 0 auto;
            border: 2px solid #ccc;
            padding: 20px;
            border-radius: 10px;
            background-color: #f9f9f9;
        }
        .booking-info {
            margin-bottom: 20px;
        }
        .booking-info h2 {
            margin-bottom: 10px;
        }
        .booking-info p {
            margin: 5px 0;
        }
    </style>
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

// Retrieve bookings data from the database
$sql = "SELECT * FROM bookings";
$result = $conn->query($sql);

// Check if there are any bookings
if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<div class='booking-receipt'>";
        echo "<div class='booking-info'>";
        echo "<h2>Booking Receipt</h2>";
        echo "<p><strong>Name:</strong> " . $row["name"] . "</p>";
        echo "<p><strong>Phone:</strong> " . $row["phone"] . "</p>";
        echo "<p><strong>Date:</strong> " . $row["date"] . "</p>";
        echo "<p><strong>Time:</strong> " . $row["time"] . "</p>";
        echo "<p><strong>Booking Details:</strong> " . $row["booking_details"] . "</p>";
        echo "</div>";
        echo "</div>";
    }
} else {
    echo "No bookings found.";
}

$conn->close();
?>

</body>
</html>
