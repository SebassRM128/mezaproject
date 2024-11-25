<?php
session_start();

if (!isset($_SESSION['login_user'])) {
    header("location: login.php");
    exit;
}

$username = $_SESSION['login_user'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="login-box">
        <h2>Bienvenido, <?php echo $username; ?></h2>
        <p>Ahora, puedes vivir, la experiencia Cartier</p>
        <br>
        <a href="cartier/index.html" class="btn">Ir a la pagina de inicio</a>
        <br><br><br>
        <a href="index.html" class="btn">Cerrar Sesion</a>
    </div>
</body>
</html>