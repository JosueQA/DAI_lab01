<?php
function lista_contactos() {
    $archivo_csv = fopen("data/datos.csv", "r");
    $indice = 0;

    # En cada iteración se relaciona a un numero de indice que va de 0 hasta que ya no hayan lineas en el .csv, y que, por orden, coincide con su valor en su campo.
    while (($datos = fgetcsv($archivo_csv)) !== false) {
        echo "<tr>";

        $link = "contacto.php?id=$indice";

        // Enlace al nombre del contacto. $datos[0] = Nombre
        echo "<td><a href='$link'>" . htmlspecialchars($datos[0]) . "</a></td>";

        // Enlace a editar el contacto
        $link = "contacto.php?id=$indice&crud=Editar";
        echo "<td><button 
                class='btn btn-warning mt-3' 
                onclick=\"window.location.href='$link'\"> Editar </button></td>";

        // Boton sin funcionalidad
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