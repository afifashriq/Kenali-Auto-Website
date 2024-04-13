<?php
// Include config.php to establish a database connection
include 'config.php';

// Check if order_id is set and not empty
if(isset($_POST['id']) && !empty($_POST['id'])) {
    // Prepare and execute the delete statement
    $stmt = $conn->prepare("DELETE FROM orders WHERE id = ?");
    $stmt->bind_param("i", $_POST['id']);
    $stmt->execute();

    // Check if the deletion was successful
    if($stmt->affected_rows > 0) {
        // Redirect back to admin_orders.php with success message
        header("Location: admin_orders.php?status=success");
        exit();
    } else {
        // Redirect back to admin_orders.php with error message
        header("Location: admin_orders.php?status=error");
        exit();
    }
} else {
    // Redirect back to admin_orders.php if order_id is not set
    header("Location: admin_orders.php");
    exit();
}
?>
