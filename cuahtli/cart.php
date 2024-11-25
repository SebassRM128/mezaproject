<?php
include('db.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="login-box">
        <h2>carrito</h2>
        <table>
            <tr>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Stock</th>
            </tr>
            <?php
            $sql = "SELECT * FROM products";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                
                    echo "<tr><td colspan='3'>Aun no hay productos en el carrito</td></tr>";
            } else {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['price'] . "</td>";
                    echo "<td>" . $row['stock'] . "</td>";
                    echo "</tr>";
                }

            }
            ?>
        </table>
        <a href="cartier/index.html" class="btn">Regresar</a>
    </div>
</body>
</html>