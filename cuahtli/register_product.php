
<?php
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $image = $_FILES['image']['name'];

    // Prevenir SQL Injection
    $name = $conn->real_escape_string($name);
    $price = $conn->real_escape_string($price);
    $stock = $conn->real_escape_string($stock);
    $image = $conn->real_escape_string($image);

    // Subir la imagen
    $target_dir = "cartier/";
    $target_file = $target_dir . basename($image);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

    $sql = "INSERT INTO products (name, price, stock, image) VALUES ('$name', '$price', '$stock', '$target_file')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Has agregado un producto')</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register Product</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="login-box">
        <h2>Register Product</h2>
        <form method="POST" action="" enctype="multipart/form-data">
            <div class="textbox">
                <input type="text" placeholder="Product Name" name="name" required>
            </div>
            <div class="textbox">
                <input type="text" placeholder="Price" name="price" required>
            </div>
            <div class="textbox">
                <input type="text" placeholder="Stock" name="stock" required>
            </div>
            <div class="textbox">
                <input type="file" name="image" required>
            </div>
            <input type="submit" class="btn" value="Registrar">
        </form>
        <br>
        <a href="catalog.php" class="btn">Regresar</a>
    </div>
</body>
</html>