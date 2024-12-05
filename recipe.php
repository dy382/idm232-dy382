<!DOCTYPE html>
  <html lang="en">

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

    <div class="search">
        <form>
            <!-- <input type="text" placeholder="Search...">
            <a href="noresultsfound.html">
              <img src="search.png" alt="Search">
            </a>
             -->        

        </form>
        <input type="text" id="searchInput" placeholder="Enter file name...">
        <button class="searchButton" id="searchButton">Search</button>

    </div>

      <ul class="nav-bar">
      <input type="checkbox" id="check">
      <span class="menu">
        <li><a href="index.php" id="currentPage" class="underline">HOME</a></li>
        <li><a href="recipe.php" class="underline">Recipes</a></li>
        <li><a href="help.php" class="underline">Help</a></li>
        <label for="check" class="close-menu"><i class="fas fa-times"></i></label>
      </span>
      <label for="check" class="open-menu"><i class="fas fa-bars"></i></label>
    </ul>
  </nav>
</div>


<div>
<?php
// Database connection
require_once './db.php';

$conn = new mysqli($db_server, $db_user, $db_pass, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get recipe ID from URL
$recipeId = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($recipeId > 0) {
    // Fetch recipe details
    $sql = "SELECT recipe_name, cuisine, cook_time, servings, descriptions, ingredients, steps, dish_image 
            FROM recipes WHERE id = ?";
    $stmt = $conn->prepare($sql);
    
    if (!$stmt) {
        die('Query preparation failed: ' . $conn->error);
    }
    
    $stmt->bind_param("i", $recipeId);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result && $result->num_rows > 0) {
        $recipe = $result->fetch_assoc();

        // Display recipe details
        echo '<h1>' . utf8_encode($recipe['recipe_name']) . '</h1>';
        echo '<div class="recipe-image">';
        echo '<img src="' . utf8_encode($recipe['dish_image']) . '" alt="' . htmlspecialchars($recipe['recipe_name']) . '" />';
        echo '</div>';
        echo '<p><strong>Cuisine:</strong> ' . htmlspecialchars($recipe['cuisine']) . '</p>';
        echo '<p><strong>Cook Time:</strong> ' . htmlspecialchars($recipe['cook_time']) . ' min</p>';
        echo '<p><strong>Servings:</strong> ' . htmlspecialchars($recipe['servings']) . '</p>';
        echo '<p><strong>Description:</strong> ' . htmlspecialchars($recipe['descriptions']) . '</p>';
        echo '<h2>Ingredients</h2>';

        // Split ingredients by '*' delimiter and display as list items
        $ingredients = explode('*', $recipe['ingredients']);
        echo '<ul>';
        foreach ($ingredients as $ingredient) {
            if (!empty(trim($ingredient))) {
                echo '<li>' . htmlspecialchars($ingredient) . '</li>';
            }
        }
        echo '</ul>';

        echo '<h2>Steps</h2>';
        echo '<p>' . nl2br(htmlspecialchars($recipe['steps'])) . '</p>';
    } else {
        echo '<p>No recipes found for ID: ' . $recipeId . '</p>';
    }
    $stmt->close();
} else {
    echo '<p>Invalid recipe ID: ' . $recipeId . '</p>';
}

$conn->close();
?>

    </div>

<footer>
  <p>© 2024 Savory Shelf</p>
</footer>

<script src="index.js"></script>
</body>
</html>