<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="reset" href="reset.css">
    <link rel="stylesheet" href="addEntry_mobile.css" media="screen and (max-width: 768px)">
    <link rel="stylesheet" href="addEntry_desktop.css" media="screen and (min-width: 769px)">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Patrick+Hand&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
    <div class="links">
    <section>
    <nav>
        <ul>
            <?php
                session_start();
                if (isset($_SESSION["email"])) {
                    echo "<li>Welcome, " . $_SESSION["email"] . "</li>";
                }
            ?>

            <li><a href="index.php">Home</a></li>
            <li><a href="aboutme.php">About Me</a></li>
            <li><a href="education.php">Education</a></li>
            <li><a href="skills.php">Skills</a></li>
            <li><a href="portfolio.php">Projects</a></li>
            <li><a href="portfolio.php">Experience</a></li>
            <li><a href="aboutme.php">Contact</a></li>
            <li><a href="viewBlog.php">Blog</a></li>
            <?php
                if (isset($_SESSION["email"])) {
                    echo "<li><a href='logout.php'>Logout</a></li>";
                } else {
                    echo "<li><a href='login.php'>Login</a></li>";
                }
            ?>
            
        </ul>
    </nav>
    </section>
    </div>
    <form class="addEntry" action="addPost.php" method="post" id="blogForm">
        <header>
        <h2>Add Blog</h2>
        </header>
        <aside>
        <input type="text" id="title" name="title" placeholder="Title" required><br><br>
        <textarea id="content" name="content" placeholder="Enter your text here" required></textarea><br><br>
        </aside>
        <div class="buttons">
        <footer>
        <input type="submit" value="Post" id="submit">
        <input type="button" value="Reset" id="reset">   
        </footer>
        </div>
        
    </form>
    </div>
    <script src="addEntry.js"></script> 
</body>
</html>