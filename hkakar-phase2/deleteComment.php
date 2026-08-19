<?php
    session_start();

    $ADMIN_EMAIL = "kakarhilla7@gmail.com";
    
    if (!isset($_SESSION["email"]) || $_SESSION["email"] !== $ADMIN_EMAIL) {
        die("Unauthorized access");
    }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $comment_id = (int)$_POST["comment_id"];
        $post_id = (int)$_POST["post_id"];
        
        $servername = "localhost";
        $db_user = "root";
        $db_password = "";
        $dbname = "phase2";
        $conn = new mysqli($servername, $db_user, $db_password, $dbname);
        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        $stmt = $conn->prepare("DELETE FROM blogcomments WHERE id = ?");
        $stmt->bind_param("i", $comment_id);
        
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