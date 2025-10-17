<?php
function lista_contactos() {
    $archivo_csv = fopen("data/datos.csv", "r");
    $indice = 0;

    while (($datos = fgetcsv($archivo_csv)) !== false) {
        echo "<tr>";

        // Enlace al nombre del contacto
        echo "<td><a href='contacto.php?id=$indice'>" . htmlspecialchars($datos[0]) . "</a></td>";

        // Botones sin funcionalidad
        echo "<td><button class='btn btn-warning mt-3'>Actualizar</button></td>";
        echo "<td><button class='btn btn-danger mt-3'>Eliminar</button></td>";

        echo "</tr>";
        $indice++;
    }
    fclose($archivo_csv);
}

function guardarContacto($nombre, $email, $telefono, $imagen = '') {
    $archivo_csv = fopen("data/datos.csv", "a");
    fputcsv($archivo_csv, [$nombre, $email, $telefono, $imagen]);
    fclose($archivo_csv);
}

function ver_contacto($id) {
    $archivo_csv = fopen("data/datos.csv", "r");
    $indice = 0;
    $contacto = null;

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