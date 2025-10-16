<?php

function ingresar_contacto(){
    $archivo_csv = fopen("datos.csv", "r");

    while (($datos = fgetcsv($archivo_csv)) !== false) {
        echo "<tr>";
        foreach ($datos as $dato) {
            echo "<td><a href=prueba.php>" . $dato . "</a></td>";
        }
        echo "</tr>";
    }
}
