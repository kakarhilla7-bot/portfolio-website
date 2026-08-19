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
        $pass2 = $_POST["confirm_password"];
        if($pass1 != $pass2) {
            $error = "Passwords do not match";
        }
        elseif(empty($email) || empty($pass1) || empty($pass2)) {
            $error = "All fields are required";
        }
        else{
            $sql = "SELECT * FROM login WHERE email='$email'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $error = "Email already exists";
            }
            else {
                $sql = "INSERT INTO login (email, password) VALUES ('$email', '$pass1')";
                if ($conn->query($sql) === TRUE) {
                    header("Location: login.php");
                    exit();
                } else {
                    $error = "Error: " . $sql . "<br>" . $conn->error;
                }
            }
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
        <h1>Register</h1>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"><br><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br><br>
        <label for="confirm_password">Confirm Password:</label><br>
        <input type="password" id="confirm_password" name="confirm_password"><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>