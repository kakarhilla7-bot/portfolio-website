<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="reset" href="reset.css">

    <link rel="stylesheet" href="aboutme_mobile.css" media="screen and (max-width: 768px)">
    <link rel="stylesheet" href="aboutme_desktop.css" media = "screen and (min-width: 769px)">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Patrick+Hand&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
    <div class="links">
    <nav>
        <ul>
            <?php
                session_start();
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
            <li><a href="about.php">Contact</a></li>
            <li><a href="viewBlog.php">Blog</a></li>
            <?php
                if (isset($_SESSION["email"])) {
                    echo "<li><a href='logout.php'>Logout</a></li>";
                }
                else {
                    echo "<li><a href='login.php'>Add Entry</a></li>";
                }
            ?>
        </ul>
    </nav>
    </div>
    <div class="aboutme">
    <header>
        <h2>About Me </h2>
    </header/>
    <article>
        <aside>
        <p>First year student at Queen Mary University of London, studying Computer Science.
             I am passionate about technology and programming, and I am eager to learn and grow 
             in this field. I have a strong interest in software development, web development, and data science.
              In my free time, I enjoy working on personal coding projects, exploring new technologies, 
          and staying up-to-date with the latest trends in the tech industry.</p>
          </aside>
            <img src="me.jpg" alt="Hilla Kakar" class="profile-pic">
    </article>
    </div>
    <div class="contact">
        <footer>
            <h2>Contact</h2>
            <p>Email: kakarhilla7@gmail.com</p>
            <p>Phone: +44 7940578862</p>
        </footer>
    </div>
    </div>
</body>
</html>