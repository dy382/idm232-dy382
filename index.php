<!DOCTYPE html>
<html lang="en">
<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
require_once './db.php';
?>

<head>  
    <title>Index</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="header">
        <nav class="navbar">
            <div class="logo">
                <a href="index.php"><h3>Savory Shelf</h3></a>
            </div>
            <ul class="nav">
                <input type="checkbox" id="check">
                <span class="menu">
                    <li><a href="index.php" id="currentPage" class="underline">HOME</a></li>
                    <li><a href="help.php" class="underline">Help</a></li>
                    <label for="check" class="close-menu"><i class="fas fa-times"></i></label>
                </span>
                <label for="check" class="open-menu"><i class="fas fa-bars"></i></label>
            </ul>
        </nav>
    </div>

    <div class="content">
        <div class="text">
            <h1>Curate, Cook, and Conquer the Kitchen.</h1>
        </div>
    </div>

    <!-- Recipe Cards Section -->
    <section class="cards-section">
        <div class="search">
            <form method="GET" action="index.php">
                <input type="text" name="query" placeholder="Search recipes..." required>
                <button type="submit">Search</button>
            </form>
        </div>

        <h2>Popular Recipes</h2>
        <div class="cards-container wide">
            <?php
            // Database connection
            $conn = new mysqli($db_server, $db_user, $db_pass, $db_name);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Check for search query
            $query = isset($_GET['query']) ? trim($_GET['query']) : '';
            $sql = "SELECT id, recipe_name, cuisine, cook_time, servings, dish_image FROM recipes";

            if (!empty($query)) {
                $sql .= " WHERE recipe_name LIKE ? OR cuisine LIKE ?";
            }

            $stmt = $conn->prepare($sql);
            if (!empty($query)) {
                $searchTerm = '%' . $query . '%';
                $stmt->bind_param("ss", $searchTerm, $searchTerm);
            }

            $stmt->execute();
            $result = $stmt->get_result();

            // Display results
            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $imagePath = (!empty($row['dish_image']) && file_exists($row['dish_image'])) ? $row['dish_image'] : 'default-image.jpg';

                    echo '<article class="recipe-card">';
                    echo '<a href="recipe.php?id=' . htmlspecialchars($row["id"]) . '">';
                    echo '<img src="' . htmlspecialchars($imagePath) . '" alt="' . htmlspecialchars($row["recipe_name"]) . '">';
                    echo '<h3>' . utf8_encode($row["recipe_name"]) . '</h3>';
                    echo '</a>';
                    echo '<p>' . htmlspecialchars($row["cuisine"]) . ' | ' . htmlspecialchars($row["cook_time"]) . ' | ' . htmlspecialchars($row["servings"]) . ' servings</p>';
                    echo '</article>';
                }
            } else {
                echo '<p>No recipes found.</p>';
            }

            $stmt->close();
            $conn->close();
            ?>
        </div>
    </section>

    <footer>
        <p>&copy; 2024 Savory Shelf</p>
    </footer>

    <script src="index.js" defer></script>
</body>
</html>
