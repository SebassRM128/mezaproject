<?php
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prevenir SQL Injection
    $username = $conn->real_escape_string($username);
    $password = $conn->real_escape_string($password);

    // Hash de la contraseña
    $password_hashed = password_hash($password, PASSWORD_BCRYPT);

    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password_hashed')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Te has registrado con exito')</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="login-box">
        <h2>Registrate</h2>
        <form method="POST" action="">
            <div class="textbox">
                <input type="text" placeholder="Nombre" name="username" required>
            </div>
            <div class="textbox">
                <input type="password" placeholder="Contraseña" name="password" required>
            </div>
            <input type="submit" class="btn" value="Register">
            <br><br>
            <a href="index.html" class="btn">Regresar</a>
        </form>
    </div>
</body>
</html>