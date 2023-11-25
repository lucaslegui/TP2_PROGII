<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombres = $_POST['nombres'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $mensaje = $_POST['mensaje'];

    $destinatario = "lucas.leguizamon@davinci.edu.ar";
    $asunto = "Nuevo mensaje de: $nombres";

    $cuerpo = "Nombres: $nombres\n";
    $cuerpo .= "Dirección: $direccion\n";
    $cuerpo .= "Teléfono: $telefono\n";
    $cuerpo .= "Email: $email\n";
    $cuerpo .= "Mensaje: $mensaje\n";

    $headers = "From: $email";

    mail($destinatario, $asunto, $cuerpo, $headers);

    echo "Mensaje enviado con éxito!";
  
    ("Refresh:3; url=../../views/contacto.php");
}
?>
