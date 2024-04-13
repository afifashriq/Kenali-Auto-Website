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

// Collect form data
$name = $_POST['name'];
$phone = $_POST['phone'];
$date = $_POST['date'];
$time = $_POST['time'];
$booking_details = $_POST['booking_details'];

// Insert data into database
$sql = "INSERT INTO bookings (name, phone, date, time, booking_details) VALUES ('$name', '$phone', '$date', '$time', '$booking_details')";

if ($conn->query($sql) === TRUE) {
    // Redirect to booking receipt page
    header("Location: booking_receipt.php?name=$name&phone=$phone&date=$date&time=$time&booking_details=$booking_details");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
