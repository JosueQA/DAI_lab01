<?php

function buscar_contacto($id) {
    if (isset($_GET['popup']) and $_GET['popup'] == 'Enabled' ){
        $archivo_csv = fopen("data/datos.csv", "r");
    } else {
        $archivo_csv = fopen("../../data/datos.csv", "r");
    }
    $indice = 0;
    $contacto = null;

    if ($id == "ultimo"){
        # Buscamos el ultimo indice (ultimo contacto)
        while (($datos = fgetcsv($archivo_csv)) !== false) {
            $indice++;
        }
        return $indice;
    } else {
        # Buscamos el contacto
        while (($datos = fgetcsv($archivo_csv)) !== false) {
            if ($indice === $id) {
                $contacto = $datos;
                break;
            }
            $indice++;
        }
        fclose($archivo_csv);
        return $contacto;
    }
}

?>