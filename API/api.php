<?php
header('Content-Type: application/json');
include_once("Class/Conexion.php");
include_once("Class/Productos.php");

$conexion = new Conexion();
$pdo = $conexion->getConexion();
$productos = new Productos($pdo);

try {
    $resultado = $productos->obtenerProductos();
    echo json_encode(['success' => true, 'data' => $resultado]);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
