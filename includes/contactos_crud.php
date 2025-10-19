<?php

include_once 'includes/buscar_contacto.php';

function guardarContacto($nombre, $email, $telefono, $imagen = '') {
    $archivo_csv = fopen("data/datos.csv", "a");
    fputcsv($archivo_csv, [$nombre, $email, $telefono, $imagen]);
    fclose($archivo_csv);
}

function ver_contacto($id) {
    $archivo_csv = fopen("data/datos.csv", "r");
    $indice = 0;
    $contacto = null;

    # Buscamos el contacto
    while (($datos = fgetcsv($archivo_csv)) !== false) {
        if ($indice === $id) {
            $contacto = $datos;
            break;
        }
        $indice++;
    }

    fclose($archivo_csv);

    echo '<section class="container mt-4">';
    echo '<h2>Visualizar Contacto</h2>';

    if ($contacto) {
        echo '<ul class="list-group">';
        echo '<li class="list-group-item"><strong>Nombre:</strong> ' . htmlspecialchars($contacto[0]) . '</li>';
        echo '<li class="list-group-item"><strong>Correo:</strong> ' . htmlspecialchars($contacto[1]) . '</li>';
        echo '<li class="list-group-item"><strong>Teléfono:</strong> ' . htmlspecialchars($contacto[2]) . '</li>';
        echo '<li class="list-group-item"><strong>Foto:</strong><br>';
        if (!empty($contacto[3])) {
            echo '<img src="assets/imagenes/' . htmlspecialchars($contacto[3]) . '" alt="Foto" style="width:100px; border-radius:8px;">';
        } else {
            echo 'Sin foto';
        }
        echo '</li>';
        echo '</ul>';
        echo '<a href="index.php" class="btn btn-primary mt-3">⬅️ Volver a la lista</a>';
    } else {
        echo '<div class="alert alert-warning">Contacto no encontrado.</div>';
    }

    echo '</section>';
}

function editar_contacto($id) {
    $archivo_csv = fopen("data/datos.csv", "r");
    $indice = 0;
    $contacto = null;

    # Buscamos el contacto
    while (($datos = fgetcsv($archivo_csv)) !== false) {
        if ($indice === $id) {
            $contacto = $datos;
            break;
        }
        $indice++;
    }

    fclose($archivo_csv);

    echo '<section class="container mt-4">';
    echo '<h2>Editar Contacto</h2>';

    if ($contacto) {
        include_once 'templates/formulario.php';
    } else {
        echo '<div class="alert alert-warning">Contacto no encontrado.</div>';
    }

    echo '</section>';
}

function eliminar_contacto($id) {
    $contacto = buscar_contacto($id);

    $csv_actual = fopen("data/datos.csv", "r");
    $csv_nuevo = fopen("data/temp.csv", "w");

    while (($linea = fgetcsv($csv_actual)) !== false) {
        if ($linea[0] !== $contacto[0]) {
            fputcsv($csv_nuevo, $linea);
        }
    }

    fclose($csv_actual);
    fclose($csv_nuevo);

    rename("data/temp.csv", "data/datos.csv");

    header("Location: index.php");
    exit;
}