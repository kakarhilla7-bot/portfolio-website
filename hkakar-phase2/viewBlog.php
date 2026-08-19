<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Patrick+Hand&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>Document</title>
    <link rel="reset" href="reset.css">
    <link rel="stylesheet" href="viewBlog_mobile.css" media="screen and (max-width: 768px)">
    <link rel="stylesheet" href="viewBlog_desktop.css" media="screen and (min-width: 769px)">
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
            <li><a href="aboutme.php">Contact</a></li>
            <?php
                if (isset($_SESSION["email"]) && $_SESSION["email"] === "kakarhilla7@gmail.com") {
                    echo "<li><a href='addEntry.php'>Add Entry</a></li>";
                }
                if (isset($_SESSION["email"])) {
                    
                    echo "<li><a href='logout.php'>Logout</a></li>";
                }
                else{
                    echo "<li><a href='login.php'>Login</a></li>";
                }

            ?>
            
        </ul>
    </nav>
    </div>
    <div class="blog_dropdown">
        <label for="blogDropdown">Filter by:</label>
        <select id="blogDropdown">
            <?php
            $selectedMonth = isset($_GET['month']) ? (int)$_GET['month'] : '';
            ?>
            <option value="all"<?php if ($selectedMonth == 'all') echo ' selected'; ?>>All</option>
            <option value="1"<?php if ($selectedMonth == 1) echo ' selected'; ?>>January</option>
            <option value="2"<?php if ($selectedMonth == 2) echo ' selected'; ?>>February</option>
            <option value="3"<?php if ($selectedMonth == 3) echo ' selected'; ?>>March</option>
            <option value="4"<?php if ($selectedMonth == 4) echo ' selected'; ?>>April</option>
            <option value="5"<?php if ($selectedMonth == 5) echo ' selected'; ?>>May</option>
            <option value="6"<?php if ($selectedMonth == 6) echo ' selected'; ?>>June</option>
            <option value="7"<?php if ($selectedMonth == 7) echo ' selected'; ?>>July</option>
            <option value="8"<?php if ($selectedMonth == 8) echo ' selected'; ?>>August</option>
            <option value="9"<?php if ($selectedMonth == 9) echo ' selected'; ?>>September</option>
            <option value="10"<?php if ($selectedMonth == 10) echo ' selected'; ?>>October</option>
            <option value="11"<?php if ($selectedMonth == 11) echo ' selected'; ?>>November</option>
            <option value="12"<?php if ($selectedMonth == 12) echo ' selected'; ?>>December</option>
        </select>
    </div>

    
<div class="blog">
    <header>
        <h2>Blog</h2><hr>
    </header>
    <article>
        <?php
            $servername = "localhost";
            $email = "root";
            $password = "";
            $dbname = "phase2";
            $conn = new mysqli($servername, $email, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $selectedMonth = isset($_GET['month']) ? (int)$_GET['month'] : '';

            if ($selectedMonth) {
                $sql = "SELECT id, title, content, date_posted FROM blogposts WHERE MONTH(date_posted) = $selectedMonth";
            } else {
                $sql = "SELECT id, title, content, date_posted FROM blogposts";
            }

            $result = $conn->query($sql);

            $allPosts = [];
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $allPosts[] = $row;
                }
            }
            $sortedPosts = bubbleSortPostsByDate($allPosts);

            if (count($sortedPosts) > 0) {
                foreach ($sortedPosts as $row) {
                    $post_id = $row["id"];
                    date_default_timezone_set('UTC');
                    $posted_date = date('jS F Y, H:i \U\T\C', strtotime($row["date_posted"]));
                    echo "<p>Posted on " . $posted_date . "</p>";
                    echo "<h3>" . htmlspecialchars($row["title"]) . "</h3>";
                    echo "<p>" . nl2br(htmlspecialchars($row["content"])) . "</p>";
                    if (isset($_SESSION["email"]) && $_SESSION["email"] === "kakarhilla7@gmail.com") {
                        echo "<form method='post' action ='deletePost.php'>";
                        echo "<input type='hidden' name='post_id' value='" . $post_id . "'>";
                        echo "<input type='submit' value='Delete Post'>";
                        echo "</form>";
                    }
                    echo "<hr>";

                    displayComments($conn, $post_id);
                    if (isset($_SESSION["email"])) {
                        echo "<form method='post' action='addComment.php'>";
                        echo "<input type='hidden' name='post_id' value='" . $post_id . "'>";
                        echo "<textarea name='comment_text' required></textarea><br>";
                        echo "<input type='submit' value='Add Comment'>";
                        echo "</form>";
                    } else {
                        echo "<p><a href='login.php'>Log in</a> to add a comment.</p>";
                    }
                    echo "<hr>";
                }       
            } else {
                session_start();
                if (isset($_SESSION["email"]) && $_SESSION["email"] === "kakarhilla7@gmail.com") {
                    header("Location: addEntry.php");
                    exit();
                }
                if (isset($_SESSION["email"])) {
                    header("Location: viewBlog.php");
                    exit();
                }
                header("Location: login.php");
                exit();
            }
            $conn->close();
        ?>
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
    <script src="blogDropdown.js"></script>
</body>
</html>

<?php
function displayComments($conn, $post_id) {
    $sql = "SELECT id, user_email, comment_text, date_posted FROM blogcomments WHERE blogpost_id = $post_id ORDER BY date_posted DESC";
    $result = $conn->query($sql);

    if ($result->num_rows>0){
        echo "<div class='comments-section'>";
        echo "<h4>Comments:</h4>";
        while($row=$result->fetch_assoc()){
            echo "<div class='comment'>";
            echo "<p><strong>" . htmlspecialchars($row["user_email"]) . "</strong> commented on " . date('jS F Y, H:i \U\T\C', strtotime($row["date_posted"])) . "</p>";
            echo "<p>" . nl2br(htmlspecialchars($row["comment_text"])) . "</p>";
            if (isset($_SESSION["email"]) && $_SESSION["email"] === "kakarhilla7@gmail.com") {
                echo "<form method='post' action='deleteComment.php'>";
                echo "<input type='hidden' name='comment_id' value='" . $row["id"] . "'>";
                echo "<input type='hidden' name='post_id' value='" . $post_id . "'>";
                echo "<input type='submit' value='Delete Comment'>";
                echo "</form>";
            }
            echo "</div>";
        }
        echo "</div>";
    }
}
?>
<?php
function bubbleSortPostsByDate($posts) {
    $n = count($posts);
    
    // Bubble sort algorithm - no built-in sort methods
    for ($i = 0; $i < $n; $i++) {
        for ($j = 0; $j < $n - $i - 1; $j++) {
            // Convert date strings to timestamps for comparison
            $date1 = strtotime($posts[$j]["date_posted"]);
            $date2 = strtotime($posts[$j + 1]["date_posted"]);
            
            // If current post is older than next post, swap them (for descending order)
            if ($date1 < $date2) {
                $temp = $posts[$j];
                $posts[$j] = $posts[$j + 1];
                $posts[$j + 1] = $temp;
            }
        }
    }
    
    return $posts;
}
?>