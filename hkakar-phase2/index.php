<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="reset" href="reset.css">

    <link rel="stylesheet" href="index_mobile.css" media="screen and (max-width: 768px)">
    <link rel="stylesheet" href="index_desktop.css" media="screen and (min-width: 769px)">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Patrick+Hand&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

</head>
<body>
    <div class="container">
    <div class="name">
    <header>
        <h1>Hilla Kakar</h1>
    </header>
    </div>
    <div class="welcome">
    <aside>
        <h2>Welcome to my Portfolio</h2>
    </aside>
    </div>  
    <div class="login">
    <?php
        session_start();
        if (isset($_SESSION["email"])) {
            echo "<a href='logout.php'><input type='button' value='Logout' class='button'></a>";
        }
        else {
            echo "<a href='login.php'><input type='button' value='Login' class='button'></a>";
        }
    ?>
    </div>
    <div class="links">
    <nav>
        <ul>
            <?php
                if (isset($_SESSION["email"])){
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
        </ul>
    </nav>
    </div>
    <div class="socials">   
    <footer>
        <div class="socials">
            <a href="https://www.linkedin.com/in/hilla-k-1701b6306/"><img src="linkedin.png" alt="LinkedIn"></a>
            <a href="https://github.com/kakarhilla7-bot"><img src="github.png" alt="GitHub"></a>
        </div>
    </footer>
    </div>
    </div>
</body>
</html>