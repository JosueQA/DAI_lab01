<?php
include_once '../validaciones.php';
include_once '../buscar_contacto.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $indice = buscar_contacto("ultimo");
    $nombre = validarNombre(isset($_POST["nombre"]) ? $_POST["nombre"] : '');
    $email = validarEmail(isset($_POST["email"]) ? $_POST["email"] : '');
    $telefono = validarTelefono(isset($_POST["telefono"]) ? $_POST["telefono"] : '');

    // Procesar imagen
    $nombre_imagen = '';
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $extension = pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION);
        $nombre_imagen = uniqid('img_') . '.' . $extension;
        move_uploaded_file($_FILES['imagen']['tmp_name'], '../../assets/imagenes/' . $nombre_imagen);
    }

    if ($nombre && $email && $telefono) {

        # Editar contacto -------------------------------------------------
        if (isset($_GET['id'])){
            $archivo_csv = fopen("../../data/datos.csv", "r");
            $csv_nuevo = fopen("../../data/temp.csv", "w");

            while (($linea = fgetcsv($archivo_csv)) !== false) {

                if ($linea[0] == intval($_GET['id'])) {
                    if ($nombre_imagen == ""){
                        $nombre_imagen = $linea[4];
                    }
                    // Si el contacto coincide, lo reemplazamos
                    fputcsv($csv_nuevo, [$linea[0], $nombre, $email, $telefono, $nombre_imagen]);
                } else {
                    // Si no, lo copiamos tal cual
                    fputcsv($csv_nuevo, $linea);
                }
            }
            fclose($csv_nuevo);
            fclose($archivo_csv);
            rename("../../data/temp.csv", "../../data/datos.csv");
        # -----------------------------------------------------------------

        } else {
            $archivo_csv = fopen("../../data/datos.csv", "a");
            fputcsv($archivo_csv, [$indice, $nombre, $email, $telefono, $nombre_imagen]);
            fclose($archivo_csv);
        }
        header("Location: ../../index.php?exito=1");
        exit();
    } else {
        header("Location: ../../index.php?error=1");
        exit();
    }
}

header("Location: ../../index.php");
exit();
?>