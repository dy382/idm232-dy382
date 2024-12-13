<!DOCTYPE html>
<html lang="en">
<head>
    <title>Recipe Details</title>
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
            <ul class="nav-bar">
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

    <div class="detail">
        <?php
        // Database connection
        require_once './db.php';

        // Create a new connection
        $conn = new mysqli($db_server, $db_user, $db_pass, $db_name);

        // Check the connection
        if ($conn->connect_error) {
            die("<p>Connection failed: " . htmlspecialchars($conn->connect_error) . "</p>");
        }

        // Get recipe ID from URL
        $recipeId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if ($recipeId) {
            // Fetch recipe details
            $sql = "SELECT recipe_name, cuisine, cook_time, servings, descriptions, ingredients, steps, dish_image, ingredients_image, steps_image
                    FROM recipes WHERE id = ?";
            $stmt = $conn->prepare($sql);

            if ($stmt) {
                $stmt->bind_param("i", $recipeId);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result && $result->num_rows > 0) {
                    $recipe = $result->fetch_assoc();

                    // Display recipe details
                    echo '<div class="recipe-intro">';
                    echo '<img src="' . htmlspecialchars($recipe['dish_image']) . '" alt="' . htmlspecialchars($recipe['recipe_name']) . '" class="dish-image" />';
                    echo '<div class="recipe-description">';
                    echo '<h1>' . utf8_encode($recipe['recipe_name']) . '</h1>';
                    echo '<p><strong>Cuisine:</strong> ' . htmlspecialchars($recipe['cuisine']) . '</p>';
                    echo '<p><strong>Cook Time:</strong> ' . htmlspecialchars($recipe['cook_time']) . '</p>';
                    echo '<p><strong>Servings:</strong> ' . htmlspecialchars($recipe['servings']) . '</p>';
                    echo '<p><strong>Description:</strong> ' . nl2br(utf8_encode($recipe['descriptions'])) . '</p>';
                    echo '</div>';
                    echo '</div>';
                    echo '<h2>Ingredients</h2>';

                    $ingredients = explode('*', $recipe['ingredients']);
                    echo '<div class="ingredients-description">';
                    echo '<ul>';
                    foreach ($ingredients as $ingredient) {
                        if (trim($ingredient)) {
                            echo '<li>' . utf8_encode($ingredient) . '</li>';
                        }
                    }
                    echo '</ul>';
                    echo '<img src="' . htmlspecialchars($recipe['ingredients_image']) . '" alt="Ingredients for ' . htmlspecialchars($recipe['recipe_name']) . '" class="ingredients-image" />';
                    echo '</div>';

                    echo '<h2>Steps</h2>';
                    $steps = explode('*', $recipe['steps']);
                    $stepImages = explode('*', $recipe['steps_image']);

                    echo '<div class="steps-container">';
                    foreach ($steps as $index => $step) {
                        if (trim($step)) {
                            $stepParts = explode('^^', $step);
                            $stepHeader = isset($stepParts[0]) ? trim($stepParts[0]) : '';
                            $stepDescription = isset($stepParts[1]) ? trim($stepParts[1]) : '';
        
                            echo '<div class="step">';
                            if ($stepHeader) {
                                echo '<h3>' . utf8_encode($stepHeader) . '</h3>';
                            }
                            if ($stepDescription) {
                                echo '<p>' . nl2br(utf8_encode($stepDescription)) . '</p>';
                            }
                            if (!empty($stepImages[$index])) {
                                echo '<img src="' . htmlspecialchars($stepImages[$index]) . '" alt="Step ' . ($index + 1) . '" class="steps-image" />';
                            }
                            echo '</div>';
                        }
                    }
                    echo '</div>';
                } else {
                    echo '<p>No recipe found for ID: ' . htmlspecialchars($recipeId) . '</p>';
                }
                $stmt->close();
            } else {
                echo '<p>Failed to prepare the query: ' . htmlspecialchars($conn->error) . '</p>';
            }
        } else {
            echo '<p>Invalid recipe ID.</p>';
        }

        // Close the connection
        $conn->close();
        ?>
    </div>

    <footer>
        <p>© 2024 Savory Shelf</p>
    </footer>

    <script src="index.js"></script>
</body>
</html>
