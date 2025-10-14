<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
<h2>📝 Formulario de contacto</h2>

<form action="<?= $_SERVER["PHP_SELF"] ?> " method="post">
    <label for="nombre">👤 Nombre:</label><br>
    <input type="text" id="nombre" name="nombre" required><br><br>

    <label for="email">📧 Correo electrónico:</label><br>
    <input type="email" id="email" name="email" required><br><br>

    <label for="numero">📱 Numero:</label><br>
    <input type="number" id="numero" name="numero" required><br><br>


    <input type="submit" value="Enviar">
    <input type="reset" value="Limpiar">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = htmlspecialchars($_POST["nombre"]);
    $email = htmlspecialchars($_POST["email"]);
    $numero = htmlspecialchars($_POST["numero"]);

    $archivo_csv = fopen("datos.csv", "a");

    fputcsv($archivo_csv, [$nombre, $email, $numero]);

    fclose($archivo_csv);

}
?>


<table>
    <!-- Cabeceras -->
    <thead>
    <tr>
        <th>👤 Nombre</th>
        <th>📧 Correo</th>
        <th>📞 Teléfono</th>
    </tr>
    </thead>
    <tbody>
    <!-- Aquí irían tus datos -->
    <?php
    $archivo_csv = fopen("datos.csv", "r");

    while (($datos = fgetcsv($archivo_csv)) !== false) {
        echo "<tr>";
        foreach ($datos as $dato) {
            echo "<td>" . $dato . "</td>";
        }
        echo "</tr>";
    }

    ?>

    </tbody>
</table>

<div>

</div>

</body>
</html>
