<?php
session_start();

// Handle remove item action
if (isset($_GET['remove'])) {
    $product_id_to_remove = $_GET['remove'];

    // Remove the product from the cart
    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['id'] == $product_id_to_remove) {
            unset($_SESSION['cart'][$key]);
            break;
        }
    }

    // Re-index the cart array to maintain proper indexing
    $_SESSION['cart'] = array_values($_SESSION['cart']);
}

// Calculate total cost
$total_price = 0;
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item) {
        $total_price += $item['price'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart - Lumos Living</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <header class="header">
        <div class="container">
            <div class="logo">
                <img src="Assets/Website Logo.png">
            </div>
            <div class="site-navigation">
                <h1 class="site-name">LUMOS LIVING</h1>
                <nav>
                    <ul class="nav-links">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="portfolio.html">Portfolio</a></li>
                        <li><a href="services.php">Services</a></li>
                    </ul>
                </nav>
            </div>
            <div class="right-side">
                <input type="text" placeholder="Search.." class="search-bar">
                <a href="cart.php" class="cart-btn">Cart (<?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; ?>)</a>
            </div>
        </div>
    </header>

    <section id="cart" class="cart">
        <h2>Your Shopping Cart</h2>

        <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0): ?>
            <table class="cart-table">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($_SESSION['cart'] as $item): ?>
                        <tr>
                            <td><?php echo $item['name']; ?></td>
                            <td>$<?php echo number_format($item['price'], 2); ?></td>
                            <td>
                                <a href="cart.php?remove=<?php echo $item['id']; ?>" class="remove-item-btn">Remove</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <div class="cart-summary">
                <p><strong>Total: $<?php echo number_format($total_price, 2); ?></strong></p>
                <button class="checkout-btn">Proceed to Checkout</button>
            </div>

        <?php else: ?>
            <p>Your cart is empty. Start shopping now!</p>
        <?php endif; ?>
    </section>

    <footer>
        <p>&copy; 2025 Lumos Living. All Rights Reserved.</p>
    </footer>

</body>

</html>