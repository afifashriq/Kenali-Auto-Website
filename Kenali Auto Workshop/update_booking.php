<?php
// Include database configuration
include 'configs.php';

// Function to sanitize user input
function sanitize_input($input) {
    return htmlspecialchars(stripslashes(trim($input)));
}

// Check if form is submitted
if(isset($_POST['id'])) {
    $id = sanitize_input($_POST['id']);
    $name = sanitize_input($_POST['name']);
    $phone = sanitize_input($_POST['phone']);
    $date = sanitize_input($_POST['date']);
    $time = sanitize_input($_POST['time']);
    $booking_details = sanitize_input($_POST['booking_details']);

    // Update booking details in the database
    $sql_update = "UPDATE bookings SET name = '$name', phone = '$phone', date = '$date', time = '$time', booking_details = '$booking_details' WHERE id = '$id'";
    if ($mysqli->query($sql_update) === TRUE) {
        // Booking details updated successfully
        header("Location: admin.php");
        exit;
    } else {
        echo "Error updating record: " . $mysqli->error;
    }
}

// Close database connection
$mysqli->close();
?>
