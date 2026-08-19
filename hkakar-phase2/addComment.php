<?php
    session_start();
    
    // Check if user is logged in
    if (!isset($_SESSION["email"])) {
        header("Location: login.php");
        exit();
    }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $post_id = (int)$_POST["post_id"];
        $comment_text = $_POST["comment_text"];
        $user_email = $_SESSION["email"];
        
        $servername = "localhost";
        $db_user = "root";
        $db_password = "";
        $dbname = "phase2";
        $conn = new mysqli($servername, $db_user, $db_password, $dbname);
        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        // Using prepared statement for security
        $stmt = $conn->prepare("INSERT INTO blogcomments (blogpost_id, user_email, comment_text) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $post_id, $user_email, $comment_text);
        
        if ($stmt->execute()) {
            header("Location: viewBlog.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
        
        $stmt->close();
        $conn->close();
    }
?>