<?php
// Include config.php to establish a database connection
include 'config.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate inputs
    $id = $_POST['id'];
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);

    // Update order details in the database
    $stmt = $conn->prepare('UPDATE orders SET name=?, email=?, phone=?, address=? WHERE id=?');
    $stmt->bind_param('ssssi', $name, $email, $phone, $address, $id);

    if ($stmt->execute()) {
        // Redirect back to admin orders page with success message
        header("Location: admin_orders.php?update=success");
        exit();
    } else {
        // Redirect back to edit order page with error message if update fails
        header("Location: edit_order.php?id=$id&error=update_failed");
        exit();
    }
} else {
    // If accessed directly, redirect to admin orders page
    header("Location: admin_orders.php");
    exit();
}
?>
