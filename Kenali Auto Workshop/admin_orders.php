<?php
// Include config.php to establish a database connection
include 'config.php';

// Initialize variables
$search_id = '';
$result = null;

// Check if a search ID is provided
if(isset($_GET['search_id'])) {
    // Sanitize the input
    $search_id = mysqli_real_escape_string($conn, $_GET['search_id']);

    // Fetch orders from the database based on the search ID
    $stmt = $conn->prepare('SELECT * FROM orders WHERE id = ?');
    $stmt->bind_param('i', $search_id);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    // Fetch all orders if no search ID is provided
    $stmt = $conn->prepare('SELECT * FROM orders');
    $stmt->execute();
    $result = $stmt->get_result();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="author" content="Afif Ashriq">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin Panel | Orders</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
  <link rel="stylesheet" href="style.css">
  <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f3f3f3;
        }
        .containers {
            max-width: 1000px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 150px;
            margin-bottom: 150px;
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
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
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
                    <li class="nav-item">
          <a class="nav-link active" href="products.php"><i class=></i>Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="checkout.php"><i class="fas fa-money-check-alt mr-2"></i>Checkout</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i> <span id="cart-item" class="badge badge-danger"></span></a>
        </li>
                    <li><a href="admin_orders.php">Admin</a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>

<div class="containers">
    <h2>Admin Orders</h2>
    <!-- Search form -->
    <form method="GET">
        <div class="form-group">
            <label for="search_id"></label>
            <input type="text" name="search_id" class="form-control" value="<?= $search_id ?>" placeholder="Enter Order ID">
        </div>
        <button type="submit" class="btn btn-primary">Search</button>
    </form>

    <!-- Display search results -->
    <table class="table">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Products</th>
                <th>Total Amount</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Display search results or all orders
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row['id'] . '</td>';
                    echo '<td>' . $row['name'] . '</td>';
                    echo '<td>' . $row['email'] . '</td>';
                    echo '<td>' . $row['phone'] . '</td>';
                    echo '<td>' . $row['address'] . '</td>';
                    echo '<td>' . $row['products'] . '</td>';
                    echo '<td>' . $row['amount_paid'] . '</td>';
                    echo '<td>';
                    echo '<form method="post" action="delete_order.php">';
                    echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
                    echo '<button type="submit" class="btn btn-danger">Delete</button>';
                    echo '</form>';
                    echo '</td>';
                    
                    echo '<td>';
                    echo '<form method="post" action="edit_order.php">';
                    echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
                    echo '<button type="submit" class="btn btn-primary">Edit</button>';
                    echo '</form>';
                    echo '</td>';

                }
            } else {
                echo '<tr><td colspan="8">No orders found.</td></tr>';
            }
            ?>
        </tbody>
    </table>
</div>

    
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
</div>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

<script type="text/javascript">
$(document).ready(function() {
    // Load total no.of items added in the cart and display in the navbar
    load_cart_item_number();

    function load_cart_item_number() {
        $.ajax({
            url: 'action.php',
            method: 'get',
            data: {
                cartItem: "cart_item"
            },
            success: function(response) {
                $("#cart-item").html(response);
            }
        });
    }
});
</script>
</body>
</html>
