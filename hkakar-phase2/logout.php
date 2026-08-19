<?php
    session_start();
    $_SESSION["email"] = null;
    session_destroy();
    $_SERVER['REFERER'] = "index.php";
    header("Location: " . $_SERVER['REFERER']);
    exit();
    
?>