<?php
include_once 'includes/validaciones.php';
include_once 'includes/funciones.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = validarNombre(isset($_POST["nombre"]) ? $_POST["nombre"] : '');
    $email = validarEmail(isset($_POST["email"]) ? $_POST["email"] : '');
    $telefono = validarTelefono(isset($_POST["telefono"]) ? $_POST["telefono"] : '');

    // Procesar imagen
    $nombre_imagen = '';
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $extension = pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION);
        $nombre_imagen = uniqid('img_') . '.' . $extension;
        move_uploaded_file($_FILES['imagen']['tmp_name'], 'assets/imagenes/' . $nombre_imagen);
    }

    if ($nombre && $email && $telefono) {
        guardarContacto($nombre, $email, $telefono, $nombre_imagen);
        header("Location: index.php?exito=1");
        exit();
    } else {
        header("Location: index.php?error=1");
        exit();
    }
}

header("Location: index.php");
exit();
?>