<!DOCTYPE html>
<?php
session_start();
$_SESSION['usuario'] = $_SERVER['PHP_AUTH_USER'];
$_SESSION['contraseña'] = $_SERVER['PHP_AUTH_PW'];

if ($_SESSION['usuario'] != 'alumno' || $_SESSION['contraseña'] != '1234') {
    header('WWW-Authenticate: Basic realm="Contenido restringido"');
    header("HTTP/1.0 401 Unauthorized");
}
?>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>
</head>

<body>
    <form action="carrito.php" method="post">
        <h1>Componentes informaticos</h1>
        <h2>
            <?php
            echo "Usuario conectado: " . $_SESSION['usuario'];
            ?>
        </h2>
        <h3>
            <?php
            if (!empty($_SESSION['carrito'])) {
                echo '<br>Hay ' . count($_SESSION['carrito']) . ' productos en la cesta<br>';
                foreach ($_SESSION['carrito'] as $producto) {
                    echo $producto . '<br>';
                }
            }
            ?>
        </h3>
        <p>
            Procesador 100€ <input type="checkbox" name="productos[]" value="procesador">
        </p>
        <p>
            Placa base 80€ <input type="checkbox" name="productos[]" value="placa">
        </p>
        <p>
            Memoria RAM 75€ <input type="checkbox" name="productos[]" value="ram">
        </p>
        <p>
            Disco Duro 40€ <input type="checkbox" name="productos[]" value="disco duro">
        </p>
        <p>
            Disipador 20€ <input type="checkbox" name="productos[]" value="disipador">
        </p>
        <input type="submit" value="Enviar">
        <a href="cerrar.php">Cerrar Sesión</a>
    </form>
</body>

</html>