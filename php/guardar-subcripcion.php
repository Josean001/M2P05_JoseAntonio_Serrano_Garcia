<?php
// Comprobamos si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recogemos y limpiamos los datos del formulario
    $correo = htmlspecialchars(trim($_POST['email']));

    // Creamos el contenido que vamos a guardar
    $contenido = "El usuario con $correo se ha suscrito.\n";

    // Guardamos la información en un archivo
    $archivo = 'suscripciones.txt'; // Nombre del archivo donde se guardará la información

    // Abrimos el archivo en modo de append (agregar)
    $modo = 'a'; // 'a' para agregar contenido al final del archivo
    $file = fopen($archivo, $modo);

    // Verificamos si el archivo se abrió correctamente
    if ($file) {
        fwrite($file, $contenido); // Escribimos el contenido en el archivo
        fclose($file); // Cerramos el archivo
        echo "Gracias por suscribirte.";
    } else {
        echo "Por favor, introduce un correo electrónico válido.";
    }
} else {
    // Si no se envió el formulario, redirigimos al usuario
    header("./index.html"); // Cambia esto a la página del formulario
    exit;
}


?>




