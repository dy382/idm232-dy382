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
        <!-- <li><a href="recipe.php" class="underline">Recipes</a></li> -->
        <li><a href="help.php" class="underline">Help</a></li>
        <label for="check" class="close-menu"><i class="fas fa-times"></i></label>
      </span>
      <label for="check" class="open-menu"><i class="fas fa-bars"></i></label>
    </ul>
  </nav>
</div>

<div class="recipeDetail">
<img src="images/Recipe_Shrimp_Fra_Diavolo_with_Lumaca_Rigata_Pasta/0101_2PF_Shrimp-Fra-Diavolo_97454_SQ_hi_res.jpg" alt="Recipe_Shrimp_Fra_Diavolo_with_Lumaca_Rigata_Pasta">
    <div class="recipetext">
      <h1>Shrimp Fra Diavolo</h1>
      <h2>with Lumaca Rigata Pasta</h2>

     <p>Preparation Time: 30 minutes</p> 

<p>Cooking Time: 45 minutes</p>

<p>Servings: 4</p>


    </div>
</div>

<div class="detail-text">
<div class="ingredients">
<h1>Ingredients</h1>

<ul>
  <li>Ingredient 1</li>
  <li>Ingredient 2</li>
  <li>Ingredient 3</li>
</ul>
</div>

<div class="instructions">
<h1>Instructions</h1>

<ul>
  <li>Instructions 1</li>
  <li>Instructions 2</li>
  <li>Instructions 3</li>
</ul>
</div>
</div>

<footer>
  <p>© 2024 Savory Shelf</p>
</footer>


<script src="index.js"></script>
</body>
</html>