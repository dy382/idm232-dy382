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
      
<div class="sorry">
  <h2>Results for: </h2>
<h4>Shrimp Fra Diavolo</h4>
  <div class="card">
    <img src="images/Recipe_Shrimp_Fra_Diavolo_with_Lumaca_Rigata_Pasta/0101_2PF_Shrimp-Fra-Diavolo_97454_SQ_hi_res.jpg" alt="Recipe_Shrimp_Fra_Diavolo_with_Lumaca_Rigata_Pasta">
    <h3>Shrimp Fra Diavolo</h3>
    <p>with Lumaca Rigata Pasta</p>
    <a href="ShrimpFraDiavolo.html" class="btn">See More</a>
  </div>
</div>

<footer>
  <p>© 2024 Savory Shelf</p>
</footer>

<script src="index.js"></script>
</body>
</html>