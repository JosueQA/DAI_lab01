<?php
function lista_contactos() {
    $archivo_csv = fopen("data/datos.csv", "r");
    $indice = 0;

    while (($datos = fgetcsv($archivo_csv)) !== false) {
        // Usamos align-middle para centrar verticalmente, si el texto/botones ocupan más espacio
        echo "<tr class='align-middle'>";

        $link_ver = "includes/contacto_crud/contacto.php?id=$indice";
        $link_editar = "includes/contacto_crud/contacto.php?id=$indice&crud=Editar";
        $link_eliminar = "includes/contacto_crud/contacto.php?id=$indice&crud=Eliminar";

        // Creamos la única celda.
        echo "<td class='d-grid' style='grid-template-columns: 1fr 0.7fr 5fr'>";

        // 1. Enlace al nombre del contacto. $datos[1] es el nombre.
        // Hacemos que el enlace al nombre sea un elemento 'inline-block' para que pueda actuar como contenedor
        // y usamos 'me-4' para darle un margen a la derecha del texto.
        echo "
        <span class='centrar'>
            <a href='$link_ver' class='d-inline-block me-4'>" . htmlspecialchars($datos[1]) . "</a>
        </span>";

        // 2. Insertamos los botones directamente DESPUÉS del nombre,
        // sin usar el div flotante (eliminamos 'float-end')

        // Botón Editar: usamos 'me-2' para separarlo ligeramente del Eliminar
        echo "
        <span class='centrar'>
            <button 
                class='btn btn-warning btn-sm me-2' 
                onclick=\"window.location.href='$link_editar'\"> Editar </button>
        </span>";

        // Botón Eliminar
        echo "
        <span class='centrar'>
            <button 
                class='btn btn-danger btn-sm'
                onclick=\"window.location.href='$link_eliminar'\">
            Eliminar</button>
        </span>";

        echo "</td>"; // Cierra td

        echo "</tr>";
        $indice++;
    }
    fclose($archivo_csv);
}
?>