<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="reset" href="reset.css">
    <link rel="stylesheet" href="register_mobile.css" media="screen and (max-width: 768px)">
    <link rel="stylesheet" href="register_desktop.css" media="screen and (min-width: 769px)">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Patrick+Hand&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container"> 
    <div class="links">
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="aboutme.php">About Me</a></li>
            <li><a href="education.php">Education</a></li>
            <li><a href="skills.php">Skills</a></li>
            <li><a href="portfolio.php">Projects</a></li>
            <li><a href="portfolio.php">Experience</a></li>
            <li><a href="aboutme.php">Contact</a></li>
            <li><a href="addEntry.php">Blog</a></li>
        </ul>
    </nav>
    </div>
    <form class="register" action=registerProcess.php method="post">
        <header>
        <h2>Register</h2>
        </header>
        <section>
        <label for="email">Email:</label>
        </section>
        <input type="email" id="email" name="email" required><br><br>
        <aside>
        <label for="password">Password:</label>
        </aside>
        <input type="password" id="password" name="password" required><br><br>
        <label for="confirm_password">Confirm Password:</label><br>
        <input type="password" id="confirm_password" name="confirm_password" required><br><br>

        <footer>
        <input type="submit" value="Register">
        </footer>
    </form>
    </div>
</body>
</html>