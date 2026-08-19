<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="reset" href="reset.css">
    <link rel="stylesheet" href="portfolio_mobile.css" media="screen and (max-width: 768px)">
    <link rel="stylesheet" href="portfolio_desktop.css" media="screen and (min-width: 769px)">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Patrick+Hand&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <title>Document</title>
</head>
<body>
    <div class = "container">
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
            <li><a href="aboutme.php">Contact</a></li>
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
    <div class="portfolio">
        <header>
        <h2>Portfolio</h2>
        </header>
    <div class="project1">
        <section>
        <h4>Snakes & Ladders Board Game June 2024 - April 2025</h4>
        <p>As part of my A-Level coursework, I independently designed amd coded a fully functional
            game using Python. This project strengthened my programming skills and gave me hands-on 
            experience in game development, showcasing my ability to create engaging and interactive applications.</p> 
        </p>
        </section>
    </div>
    <div class="project2">
        <aside>
        <h4>Cat And Mouse Game September 2025 - December 2025</h4>
        <p>A simple 2D chase game built as my first project while learning Java. I developed the game
            incrementally, implementing each feature method by method. I practiced decomposition, which
          allowed me to simplify my methods as much as possible, which increased my confidence in Java.</p>
        </aside>
    </div>
    </div>  
    <div class="experience">
    <h2>Experience</h2>
    <div class="experience1">
        <article>
        <h4>Technology on Demand Virtual Work Experience December 2023 - January 2024</h4>
        <p>I completed this programme to get a feel for what is required of an employee in the tech industry. 
            I completed several activities that were beginner friendly. They represented computational concepts, such as 
            binary problems, and completing very simple snippets of python code. I got to design my own machine, which was 
            a self watering plant pot. In summary, I found the activites very insightful and enjoyable, as I was able to complete
            the work in my own free time. There were also videos of tech employees being interviewed and asked about how they find 
            their job, a day in their life, and what they love most about it. </p>
        </article>
    </div>
    </div>
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