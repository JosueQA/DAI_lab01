<?php
function editar_contacto_valores($posicion) {

    if (isset($_GET['id']) and isset($_GET['crud']) and $_GET['crud'] == "Editar") {

        $contacto = buscar_contacto(intval($_GET['id']));
        return htmlspecialchars($contacto[$posicion]);

    } else {
        return "";
    }
}
?>