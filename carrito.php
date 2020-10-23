<?php
session_start();

$productos = $_POST['productos'];

if (empty($_SESSION['carrito'])) {
    $_SESSION['carrito'] = array();
    for ($i = 0; $i < count($productos); $i++) {
        array_push($_SESSION['carrito'], $productos[$i]);
    }
} else {
    for ($i = 0; $i < count($productos); $i++) {
        array_push($_SESSION['carrito'], $productos[$i]);
    }
}
header('Location: index.php');