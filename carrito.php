<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
</head>
<body>

    <h1>Carrito</h1>
    <ul>
        <?php
        if (isset($_GET['producto'])) {
            echo '<li>' . $_GET['producto'] . '</li>';
        }
        ?>
    </ul>

    <a href="index.html">Volver a la tienda</a>

</body>
</html>