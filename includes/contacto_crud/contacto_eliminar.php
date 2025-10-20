<?php
$contacto = buscar_contacto(intval($_GET['id']));

$csv_actual = fopen("../../data/datos.csv", "r");
$csv_nuevo = fopen("../../data/temp.csv", "w");

while (($linea = fgetcsv($csv_actual)) !== false) {
    if ($linea[0] !== $contacto[0]) {
        fputcsv($csv_nuevo, $linea);
    }
}

fclose($csv_actual);
fclose($csv_nuevo);

rename("../../data/temp.csv", "../../data/datos.csv");

header("Location: ../../index.php");
exit;
?>