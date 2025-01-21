<?php
session_start();

// Handle add to cart action
if (isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    // Store product in cart session
    $_SESSION['cart'][] = [
        'id' => $product_id,
        'name' => $product_name,
        'price' => $product_price

    ];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services - Lumos Living</title>
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
                        <!--<li><a href="services.php">Services</a></li> <!-- Active on services page -->
                        <li><a href="#">Reviews</a></li>
                        <!--<li><a href="designtips.html">Design Tips</a></li>
                        <li><a href="gallery.html">Gallery</a></li>
                        <li><a href="index.php">Contact</a></li>
                        <li><a href="index.php">FAQs</a></li>-->
                    </ul>
                </nav>
            </div>
            <div class="right-side">
                <input type="text" placeholder="Search.." class="search-bar">
                <a href="cart.php" class="cart-btn">Cart (<?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; ?>)</a>
            </div>
        </div>
    </header>

    <section id="services" class="services">

        <h2>Shop Our Products</h2>

        <!-- Paints -->
        <h3>Paint</h3>
        <div class="product-list">
            <div class="product-item">
                <img src="Assets/products/paint/paint1.jpg" alt="Paint 1">
                <h4>Premium White Paint</h4>
                <p>$20</p>
                <form action="services.php" method="POST">
                    <input type="hidden" name="product_id" value="1">
                    <input type="hidden" name="product_name" value="Premium White Paint">
                    <input type="hidden" name="product_price" value="20">
                    <button type="submit" name="add_to_cart" class="add-to-cart-btn">Add to Cart</button>
                </form>

            </div>
            <div class="product-item">
                <img src="Assets/products/paint/paint2.jpeg" alt="Paint 2">
                <h4>Ocean Blue Paint</h4>
                <p>$25</p>
                <form action="services.php" method="POST">
                    <input type="hidden" name="product_id" value="2">
                    <input type="hidden" name="product_name" value="Ocean Blue Paint">
                    <input type="hidden" name="product_price" value="25">
                    <button type="submit" name="add_to_cart" class="add-to-cart-btn">Add to Cart</button>
                </form>
            </div>
        </div>

        <!-- Curtains -->
        <h3>Curtains</h3>
        <div class="product-list">
            <div class="product-item">
                <img src="Assets/products/curtains/Curtain1.jpeg" alt="Curtain 1">
                <h4>Luxury Velvet Curtain</h4>
                <p>$50</p>
                <form action="services.php" method="POST">
                    <input type="hidden" name="product_id" value="3">
                    <input type="hidden" name="product_name" value="Luxury Velvet Curtain">
                    <input type="hidden" name="product_price" value="50">
                    <button type="submit" name="add_to_cart" class="add-to-cart-btn">Add to Cart</button>
                </form>
            </div>
            <div class="product-item">
                <img src="Assets/products/curtains/Curtain2.jpeg" alt="Curtain 2">
                <h4>Elegant Sheer Curtain</h4>
                <p>$35</p>
                <form action="services.php" method="POST">
                    <input type="hidden" name="product_id" value="4">
                    <input type="hidden" name="product_name" value="Elegant Sheer Curtain">
                    <input type="hidden" name="product_price" value="35">
                    <button type="submit" name="add_to_cart" class="add-to-cart-btn">Add to Cart</button>
                </form>
            </div>
        </div>

        <!-- Vase -->
        <h3>Vase</h3>
        <div class="product-list">
            <div class="product-item">
                <img src="Assets/products/Vase/Vase1.jpeg" alt="Vase 1">
                <h4>Glass Vase</h4>
                <p>$30</p>
                <form action="services.php" method="POST">
                    <input type="hidden" name="product_id" value="5">
                    <input type="hidden" name="product_name" value="Glass Vase">
                    <input type="hidden" name="product_price" value="30">
                    <button type="submit" name="add_to_cart" class="add-to-cart-btn">Add to Cart</button>
                </form>
            </div>
            <div class="product-item">
                <img src="Assets/products/Vase/images.jpeg" alt="Vase 2">
                <h4>Floral Vase</h4>
                <p>$40</p>
                <form action="services.php" method="POST">
                    <input type="hidden" name="product_id" value="6">
                    <input type="hidden" name="product_name" value="Floral Vase">
                    <input type="hidden" name="product_price" value="40">
                    <button type="submit" name="add_to_cart" class="add-to-cart-btn">Add to Cart</button>
                </form>
            </div>
        </div>

        <!-- Chairs -->
        <h3>Chairs</h3>
        <div class="product-list">
            <div class="product-item">
                <img src="Assets/products/chair/download.jpeg" alt="Chair 1">
                <h4>Comfort Chair</h4>
                <p>$100</p>
                <form action="services.php" method="POST">
                    <input type="hidden" name="product_id" value="7">
                    <input type="hidden" name="product_name" value="Comfort Chair">
                    <input type="hidden" name="product_price" value="100">
                    <button type="submit" name="add_to_cart" class="add-to-cart-btn">Add to Cart</button>
                </form>
            </div>
            <div class="product-item">
                <img src="Assets/products/chair/download (1).jpeg" alt="Chair 2">
                <h4>Luxury Chair</h4>
                <p>$120</p>
                <form action="services.php" method="POST">
                    <input type="hidden" name="product_id" value="8">
                    <input type="hidden" name="product_name" value="Luxury Chair">
                    <input type="hidden" name="product_price" value="120">
                    <button type="submit" name="add_to_cart" class="add-to-cart-btn">Add to Cart</button>
                </form>
            </div>
        </div>

        <!-- Photo Frames -->
        <h3>Photo Frames</h3>
        <div class="product-list">
            <div class="product-item">
                <img src="Assets/products/wooden_frame_.webp" alt="Photo Frame 1">
                <h4>Wooden Frame</h4>
                <p>$15</p>
                <form action="services.php" method="POST">
                    <input type="hidden" name="product_id" value="9">
                    <input type="hidden" name="product_name" value="Wooden Frame">
                    <input type="hidden" name="product_price" value="15">
                    <button type="submit" name="add_to_cart" class="add-to-cart-btn">Add to Cart</button>
                </form>
            </div>
            <div class="product-item">
                <img src="Assets/products/frames/designer-wooden-frame.jpg" alt="Photo Frame 2">
                <h4>Modern Metal Frame</h4>
                <p>$18</p>
                <form action="services.php" method="POST">
                    <input type="hidden" name="product_id" value="10">
                    <input type="hidden" name="product_name" value="Modern Metal Frame">
                    <input type="hidden" name="product_price" value="18">
                    <button type="submit" name="add_to_cart" class="add-to-cart-btn">Add to Cart</button>
                </form>
            </div>
        </div>

        <!-- Sofas -->
        <h3>Sofas</h3>
        <div class="product-list">
            <div class="product-item">
                <img src="Assets/products/Sofas/1200x1200-2023-09-24T141634.368.jpg" alt="Sofa 1">
                <h4>Luxury Sofa</h4>
                <p>$500</p>
                <form action="services.php" method="POST">
                    <input type="hidden" name="product_id" value="11">
                    <input type="hidden" name="product_name" value="Luxury Sofa">
                    <input type="hidden" name="product_price" value="500">
                    <button type="submit" name="add_to_cart" class="add-to-cart-btn">Add to Cart</button>
                </form>
            </div>
            <div class="product-item">
                <img src="Assets/products/Sofas/sofa.jpeg" alt="Sofa 2">
                <h4>Comfort Sofa</h4>
                <p>$450</p>
                <form action="services.php" method="POST">
                    <input type="hidden" name="product_id" value="12">
                    <input type="hidden" name="product_name" value="Comfort Sofa">
                    <input type="hidden" name="product_price" value="450">
                    <button type="submit" name="add_to_cart" class="add-to-cart-btn">Add to Cart</button>
                </form>
            </div>
        </div>

        <!-- Wallpapers -->
        <h3>Wallpapers</h3>
        <div class="product-list">
            <div class="product-item">
                <img src="Assets/products/Wallpaper/home-wallpaper.jpg" alt="Wallpaper 1">
                <h4>Abstract Wallpaper</h4>
                <p>$30</p>
                <form action="services.php" method="POST">
                    <input type="hidden" name="product_id" value="13">
                    <input type="hidden" name="product_name" value="Abstract Wallpaper">
                    <input type="hidden" name="product_price" value="30">
                    <button type="submit" name="add_to_cart" class="add-to-cart-btn">Add to Cart</button>
                </form>
            </div>
            <div class="product-item">
                <img src="Assets/products/Wallpaper/wallpaper.avif" alt="Wallpaper 2">
                <h4>Floral Wallpaper</h4>
                <p>$25</p>
                <form action="services.php" method="POST">
                    <input type="hidden" name="product_id" value="14">
                    <input type="hidden" name="product_name" value="Floral Wallpaper">
                    <input type="hidden" name="product_price" value="25">
                    <button type="submit" name="add_to_cart" class="add-to-cart-btn">Add to Cart</button>
                </form>
            </div>
        </div>

        <!-- Cabinets -->
        <h3>Cabinets</h3>
        <div class="product-list">
            <div class="product-item">
                <img src="Assets/products/cabinets/cabinet1.jpeg" alt="Cabinet 1">
                <h4>Wooden Cabinet</h4>
                <p>$200</p>
                <form action="services.php" method="POST">
                    <input type="hidden" name="product_id" value="15">
                    <input type="hidden" name="product_name" value="Wooden Cabinet">
                    <input type="hidden" name="product_price" value="200">
                    <button type="submit" name="add_to_cart" class="add-to-cart-btn">Add to Cart</button>
                </form>
            </div>
            <div class="product-item">
                <img src="Assets/products/cabinets/wooden-storage-side-table-3.webp" alt="Cabinet 2">
                <h4>Modern Glass Cabinet</h4>
                <p>$250</p>
                <form action="services.php" method="POST">
                    <input type="hidden" name="product_id" value="16">
                    <input type="hidden" name="product_name" value="Modern Glass Cabinet">
                    <input type="hidden" name="product_price" value="250">
                    <button type="submit" name="add_to_cart" class="add-to-cart-btn">Add to Cart</button>
                </form>
            </div>
        </div>

        <!-- Showpieces -->
        <h3>Showpieces</h3>
        <div class="product-list">
            <div class="product-item">
                <img src="Assets/products/showpieces/Planters.jpg" alt="Showpiece 1">
                <h4>Gold Figurine</h4>
                <p>$60</p>
                <form action="services.php" method="POST">
                    <input type="hidden" name="product_id" value="17">
                    <input type="hidden" name="product_name" value="Gold Figurine">
                    <input type="hidden" name="product_price" value="60">
                    <button type="submit" name="add_to_cart" class="add-to-cart-btn">Add to Cart</button>
                </form>
            </div>
            <div class="product-item">
                <img src="Assets/products/showpieces/Showpiece.webp" alt="Showpiece 2">
                <h4>Wooden Statue</h4>
                <p>$70</p>
                <form action="services.php" method="POST">
                    <input type="hidden" name="product_id" value="18">
                    <input type="hidden" name="product_name" value="Wooden Statue">
                    <input type="hidden" name="product_price" value="70">
                    <button type="submit" name="add_to_cart" class="add-to-cart-btn">Add to Cart</button>
                </form>
            </div>
        </div>

        <!-- Center Table -->
        <h3>Center Tables</h3>
        <div class="product-list">
            <div class="product-item">
                <img src="Assets/products/center table/center table 1.jpg" alt="Center Table 1">
                <h4>Wooden Center Table</h4>
                <p>$150</p>
                <form action="services.php" method="POST">
                    <input type="hidden" name="product_id" value="19">
                    <input type="hidden" name="product_name" value="Wooden Center Table">
                    <input type="hidden" name="product_price" value="150">
                    <button type="submit" name="add_to_cart" class="add-to-cart-btn">Add to Cart</button>
                </form>
            </div>
            <div class="product-item">
                <img src="Assets/products/center table/center table 2.webp" alt="Center Table 2">
                <h4>Modern Glass Center Table</h4>
                <p>$200</p>
                <form action="services.php" method="POST">
                    <input type="hidden" name="product_id" value="20">
                    <input type="hidden" name="product_name" value="Modern Glass Center Table">
                    <input type="hidden" name="product_price" value="200">
                    <button type="submit" name="add_to_cart" class="add-to-cart-btn">Add to Cart</button>
                </form>
            </div>
        </div>

    </section>

    <footer>
        <p>&copy; 2025 Lumos Living. All Rights Reserved.</p>
    </footer>
</body>

</html>