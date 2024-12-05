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


    <div class="search">
            <input type="text" id="searchInput" placeholder="Search for recipes..." />
            <button id="searchButton">Search</button>
        </div>
    </div>

<!-- Recipe Cards Section -->
<!-- <section class="cards-section">
    <h2>Popular Recipes</h2>
    <div id="cards-container" class="cards-container wide">
        <!-- Recipe cards will be populated here 
    </div>
</section> -->



      <ul class="nav-bar">
      <input type="checkbox" id="check">
      <span class="menu">
        <li><a href="index.php" id="currentPage" class="underline">HOME</a></li>
        <!-- <li><a href="recipe.php" class="underline">Recipes</a></li> -->
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
        <a href="recipe.php" class="btn">See More</a>
    </div>
    <!-- <img src="images/32-spicyporkkorean/32-spicyporkkorean-hero.webp" alt="Recipe_Spicy_Pork_Korean_Rice_Cakes_with_Bok_Choy"> -->
</div>

<!-- Recipe Cards Section -->
<section class="cards-section">
                <h2>Popular Recipes</h2>
                <div class="cards-container wide">
                    <?php
                    // Database connection
                    $conn = new mysqli($db_server, $db_user, $db_pass, $db_name);

                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                   // Fetch recipes from the database
                    $sql = "SELECT id, recipe_name, cuisine, cook_time, servings, dish_image FROM recipes";
                    $result = $conn->query($sql);

                    if ($result && $result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            // Use default image if dish_image is empty or file doesn't exist
                            $imagePath = (!empty($row['dish_image']) && file_exists($row['dish_image'])) 
                                        ? $row['dish_image'] 
                                        : '';

                            echo '<article class="recipe-card">';
                            echo '<a href="recipe.php?id=' . $row["id"] . '">'; // Link with recipe ID
                            echo '<img src="' . utf8_encode($imagePath) . '" alt="' . utf8_encode($row["recipe_name"]) . '" loading="lazy">';
                            echo '<h3>' . utf8_encode($row["recipe_name"]) . '</h3>';
                            echo '</a>';
                            echo '<p>' . htmlspecialchars($row["cuisine"]) . ' | ' . $row["cook_time"] . ' | ' . $row["servings"] . ' </p>';
                            echo '</article>';
                        }
                    } else {
                        echo "<p>No recipes found.</p>";
                    }

                    $conn->close();
                    ?>
                </div>
            </section>

<footer>
  <p>© 2024 Savory Shelf</p>
</footer>

<script src="index.js" defer></script>
</body>
</html>