<!DOCTYPE html>
<html lang="en">
<head>
    <title>Recipe Details</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer">
</head>
<body>

<div class="header">
        <nav class="navbar">
            <div class="logo">
                <a href="index.php"><h3>Savory Shelf</h3></a>
            </div>
            <div class="nav">
                <input type="checkbox" id="check">
                <div class="menu">
                    <a href="index.php" id="currentPage" class="underline">HOME</a>
                    <a href="help.php" class="underline">Help</a>
                    <label for="check" class="close-menu"><i class="fas fa-times"></i></label>
                </div>
                <label for="check" class="open-menu"><i class="fas fa-bars"></i></label>
            </div>
        </nav>
    </div>

<div class="casestudy">
<h1>Case Study</h1>

<img src="./images/thumbnail.png">

<h2>Overview</h2>
<p>For my IDM 232 class, I created a project called Savory Shelf, incorporating my learned knowledge of PHP and SQL. This project served as the building blocks for understanding how to use this language and program effectively. The assignment focused on creating an intuitive recipe website that allowed users to search and browse through a comprehensive culinary database. It required a combination of design, database management, and server-side scripting to deliver a polished and user-friendly application.</p>

<h2>Context and Challenge</h2>
<p>The task was to develop a branded, responsive recipe website that enabled users to easily search for and browse recipes. The project involved organizing a large culinary database filled with diverse content. Key requirements included:</p>
<ul>
    <li>Implementing secure data handling with validated inputs and database connections. </li>
    <li>Applying best practices in server-side scripting to ensure a scalable and maintainable application.</li>
    <li>Designing a modern, approachable, and visually engaging user interface.</li>
</ul>
<p>The challenge lay in managing the vast amount of recipe data, structuring it effectively, and ensuring seamless functionality for users to interact with the content. Additionally, this was my first significant foray into using PHP, adding an extra layer of learning and implementation complexity.</p>

<h2>Process and Insight</h2>
<h3>Design and Planning:</h3>
<p>I began the project by seeking design inspiration and creating layouts in Figma. The goal was to establish a modern and approachable aesthetic, with vibrant colors and typography that added a fun and inviting feel. The branding was kept short and impactful, and I prioritized responsive design to ensure the site’s usability across different devices.</p>

<h3>Database Organization:</h3>
<p>Once the design was finalized, I focused on organizing the recipe information. This involved categorizing data by name, cuisine type, ingredients, steps, and associated images. I refined the image assets by resizing and renaming them to streamline processing on the website.</p>
<img src="./images/design.png">
<h3>PHP and SQL Integration:</h3>
<p>The core of the project involved leveraging PHP and SQL to manage and display the data. Using PHP templates, I avoided the need to create individual pages for every recipe. Instead, dynamic templates fetched data from the database and populated the pages accordingly. This streamlined development while maintaining consistency.</p>

<p>I also implemented error handling to guide users in cases such as unsuccessful searches (e.g., “no search found” pages). By incorporating server-side programming, I could enhance the website’s functionality while maintaining clean and organized code.</p>

<h2>The Solution</h2>
<p>The final product was a branded, responsive recipe website that enabled users to search and browse a database of recipes. The site included search functionality, dynamic recipe pages, and supplemental pages.</p>

<img src="./images/thumbnail.png">

<h2>The Results</h2>
<p>This project demonstrated my ability to integrate server-side programming with front-end design, resulting in a polished and functional recipe website.</p>
<p>If I were to revisit this project, I would focus on adding more advanced features, such as filtering options for easier navigation and user accounts for personalized recipe management. Overall, this experience provided a solid foundation in PHP and significantly enhanced my confidence in combining design and programming skills to create meaningful digital solutions.</p>   

</div>

<footer>
        <p>© 2024 Savory Shelf</p>
    </footer>

    <script src="index.js"></script>
</body>
</html>
