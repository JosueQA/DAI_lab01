<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

</head>
<body>
<h2>📝 Formulario de contacto</h2>

<form action="<?= $_SERVER["PHP_SELF"] ?> " method="post">
    <label for="nombre">👤 Nombre:</label><br>
    <input type="text" id="nombre" name="nombre" required><br><br>

    <label for="email">📧 Correo electrónico:</label><br>
    <input type="email" id="email" name="email" required><br><br>

    <label for="telefono">📱 Nro de teléfono:</label><br>
    <input type="tel" id="telefono" name="telefono" placeholder="999 999 999" inputmode="numeric" required><br><br>

    <!-- etiqueta de numero anterior
    <label for="numero">📱 Numero:</label><br>
    <input type="number" id="numero" name="numero" required><br><br>
    -->


    <input type="submit" value="Enviar">
    <input type="reset" value="Limpiar"><br><br>
</form>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = htmlspecialchars($_POST["nombre"]);
    $email = htmlspecialchars($_POST["email"]);
    $numero = htmlspecialchars($_POST["telefono"]);

    $archivo_csv = fopen("datos.csv", "a");

    fputcsv($archivo_csv, [$nombre, $email, $numero]);
    fclose($archivo_csv);
}
?>


<input class="btn btn-primary" type="button" value="Editar">
<input class="btn btn-primary" type="submit" value="Eliminar">

<table class="table table-hover">
    <!-- Cabeceras -->
    <thead>
    <tr>
        <th scope="col">👤 Nombre</th>
        <th scope="col">📧 Correo</th>
        <th scope="col">📞 Teléfono</th>
    </tr>
    </thead>
    <tbody>
    <!-- Aquí irían tus datos -->
    <?php ingresar_contacto(); ?>

    </tbody>
</table>

<div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>
