<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Contactos</title>
    <?= (isset($_GET['id']))
            ? '<link rel="stylesheet" href="../../assets/style.css">'
            : '<link rel="stylesheet" href="assets/style.css">'?>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="layout">
    <header class="bg-primary text-white p-3">
        <div class="container">
            <h1>📝 Mi Libreta de Contactos</h1>
        </div>
    </header>

<main class="container my-4">
