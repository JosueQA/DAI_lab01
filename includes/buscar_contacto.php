<?php

function buscar_contacto($id) {
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

    return $contacto;
}

?>