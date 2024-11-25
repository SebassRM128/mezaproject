<?php
session_start();
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prevenir SQL Injection
    $username = $conn->real_escape_string($username);
    $password = $conn->real_escape_string($password);

    $sql = "SELECT id, username, password FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($username == "S1303cartieradmin" && $password == "cartieradmin") {
        header("location: admin.php");
        exit;
    }
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['login_user'] = $row['username'];
            header("location: profile.php");
        } else {
            echo "<script>alert('Contraseña Incorrecta')</script>";
        }
    } else {
        echo "<script>alert('Usuario no registrado')</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Log In</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="login-box">
        <h2>Log In</h2>
        <form method="POST" action="">
            <div class="textbox">
                <input type="text" placeholder="Username" name="username" required>
            </div>
            <div class="textbox">
                <input type="password" placeholder="Password" name="password" required>
            </div>
            <input type="submit" class="btn" value="Login">
            <p>Aun no tienes cuenta? <a href="register.php" class="btn">Sign Up</a></p>

        </form>
    </div>
</body>
</html>