<?php
/**
@return void
*/
function lista_contactos() {
    $archivo_csv = fopen("data/datos.csv", "r");
    $contactos = [];

    // Cargar todos los contactos en un array
    while (($datos = fgetcsv($archivo_csv)) !== false) {
        $contactos[] = $datos;
    }
    fclose($archivo_csv);

    // Ordenar alfabéticamente por nombre (posición 1)
    usort($contactos, function($a, $b) {
        return strcasecmp($a[1], $b[1]);    });

    // Mostrar la tabla ordenada
    foreach ($contactos as $datos) {
        $id_real = $datos[0]; // ID original del contacto
        $link_ver = "includes/contacto_crud/contacto.php?id=$id_real";

        echo "<tr class='align-middle'>";
        echo "<td class='text-start'>";
        echo "
    <span class='centrar'>
        <a href='$link_ver' class='d-inline-block me-4 nombre-contacto'>" . htmlspecialchars($datos[1]) . "</a>
    </span>";
        echo "</td>";
        echo "</tr>";
    }

}
?>