<?php
// Comprobamos si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recogemos y limpiamos los datos del formulario
    $nombre = htmlspecialchars(trim($_POST['nombre']));
    $correo = htmlspecialchars(trim($_POST['email']));
    $mensaje = htmlspecialchars(trim($_POST['mensaje']));

    // Creamos el contenido que vamos a guardar
    $contenido = "Nombre: $nombre\nCorreo: $correo\nMensaje: $mensaje\n\n";

    // Guardamos la información en un archivo
    $archivo = 'contactos.txt'; // Nombre del archivo donde se guardará la información

    // Abrimos el archivo en modo de append (agregar)
    $modo = 'a'; // 'a' para agregar contenido al final del archivo
    $file = fopen($archivo, $modo);

    // Verificamos si el archivo se abrió correctamente
    if ($file) {
        fwrite($file, $contenido); // Escribimos el contenido en el archivo
        fclose($file); // Cerramos el archivo
        echo "Mensaje guardado con éxito.";
    } else {
        echo "Ocurrió un error al abrir el archivo.";
    }
} else {
    // Si no se envió el formulario, redirigimos al usuario
    header("./index.html"); // Cambia esto a la página del formulario
    exit;
}
?>

