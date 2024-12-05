<?php
// Database connection
require_once './db.php';
$conn = new mysqli($db_server, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get search query
$query = isset($_GET['query']) ? $conn->real_escape_string($_GET['query']) : "";

// Fetch recipes based on the search query
$sql = "SELECT id, recipe_name, cuisine, cook_time, servings, dish_image 
        FROM recipes 
        WHERE recipe_name LIKE '%$query%' 
           OR cuisine LIKE '%$query%' 
           OR cook_time LIKE '%$query%' 
           OR servings LIKE '%$query%'";

$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $imagePath = (!empty($row['dish_image']) && file_exists($row['dish_image'])) 
                    ? $row['dish_image'] 
                    : 'default-image.webp';

        echo '<article class="recipe-card">';
        echo '<a href="recipe.php?id=' . $row["id"] . '">';
        echo '<img src="' . htmlspecialchars($imagePath) . '" alt="' . htmlspecialchars($row["recipe_name"]) . '" loading="lazy">';
        echo '<h3>' . htmlspecialchars($row["recipe_name"]) . '</h3>';
        echo '</a>';
        echo '<p>' . htmlspecialchars($row["cuisine"]) . ' | ' . $row["cook_time"] . ' | ' . $row["servings"] . '</p>';
        echo '</article>';
    }
} else {
    echo "<p>No recipes found.</p>";
}

$conn->close();
?>
