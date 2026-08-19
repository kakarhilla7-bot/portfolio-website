
<?php
    session_start();
    $servername = "localhost";
    $email = "root";
    $password = "";
    $dbname = "phase2";
    $conn = new mysqli($servername, $email, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["email"];
        $pass1 = $_POST["password"];
        $sql = "SELECT password FROM login WHERE email='$email'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if ($row["password"] == $pass1) {
                
                $_SESSION["email"] = $email;
                if ($email === "kakarhilla7@gmail.com") {
                    header("Location: addEntry.php");
                    exit();
                } else {
                    header("Location: viewBlog.php");
                    exit();
                }
            } else{
                echo "Incorrect password";
            }

        } else {
            echo "No user found with that email";
        }
        $conn->close();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action=<?php echo $_SERVER['PHP_SELF']?> method="post">
        <h1>Login</h1>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"><br><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>