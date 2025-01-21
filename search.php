<?php
require 'db_connect.php'; // Include database connection

// Get search query
$query = isset($_GET['query']) ? htmlspecialchars($_GET['query']) : '';

// SQL to search products
$sql = "SELECT * FROM products WHERE name LIKE ? OR description LIKE ?";
$stmt = $conn->prepare($sql);
$searchTerm = "%" . $query . "%";
$stmt->bind_param("ss", $searchTerm, $searchTerm);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <header class="header">
        <h1>Search Results for "<?php echo $query; ?>"</h1>
    </header>

    <main class="container">
        <?php if ($result->num_rows > 0): ?>
            <ul class="search-results">
                <?php while ($row = $result->fetch_assoc()): ?>
                    <li class="product-item">
                        <a href="services.php?product=<?php echo urlencode($row['name']); ?>" class="product-link">
                            <h2><?php echo htmlspecialchars($row['name']); ?></h2>
                        </a>
                        <p><?php echo htmlspecialchars($row['description']); ?></p>
                        <p><strong>Price:</strong> $<?php echo number_format($row['price'], 2); ?></p>
                    </li>
                <?php endwhile; ?>
            </ul>
        <?php else: ?>
            <p>No results found for "<?php echo $query; ?>".</p>
        <?php endif; ?>
    </main>

    <footer class="footer">
        <p>&copy; 2024 Lumos Living</p>
    </footer>
</body>

</html>

<?php
$stmt->close();
$conn->close();
?>