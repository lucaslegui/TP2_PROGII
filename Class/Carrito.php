<?php
// session_start();

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idProducto = $_POST['id_prduct'];
    $cantidad = $_POST['cantidad'];

    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = [];
    }
   
    $_SESSION['carrito'][$idProducto] = [
        'cantidad' => $cantidad,
       
    ];

 
    echo json_encode(['success' => true, 'message' => 'Producto agregado al carrito']);

}

// function generarRespuestaCarrito() {
//     $respuesta = '';
//     return $respuesta;
// }
