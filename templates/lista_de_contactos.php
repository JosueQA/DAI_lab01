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

        // Enlace a eliminar el contacto
        $link = "contacto.php?id=$indice&crud=Eliminar";
        echo "<td><button 
                class='btn btn-danger mt-3'
                onclick=\"window.location.href='$link'\">
                Eliminar</button></td>";

        echo "</tr>";
        $indice++;
    }
    fclose($archivo_csv);
}
?>