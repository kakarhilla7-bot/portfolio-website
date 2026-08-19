<?php
    $servername = "localhost";
    $title = "root";
    $content = "";
    $dbname = "phase2";
    $conn = new mysqli($servername, $title, $content, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $title = $_POST["title"];
        $content = $_POST["content"];
        $date_posted = date('Y-m-d H:i:s');
        $sql = "INSERT INTO blogposts (title, content, date_posted) VALUES ('$title', '$content', NOW())";

        if ($conn->query($sql) === TRUE) {
            echo "New post created successfully";
            header("Location: viewBlog.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
?>