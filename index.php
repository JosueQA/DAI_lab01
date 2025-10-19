<?php
include_once 'templates/header.php';
include_once 'templates/lista_de_contactos.php';
include_once 'includes/contactos_crud.php';
?>

<section class="container mt-4">

    <h2>Lista de Contactos</h2>

    <!-- Botón para crear contacto -->
    <a href="gestionar_contacto.php" class="btn btn-primary mt-3">
        ➕ Crear nuevo contacto
    </a>

<table class="table table-hover">
    <!-- Cabeceras -->
    <thead>
    <tr>
        <th scope="col">👤 Nombre</th>
    </tr>
    </thead>
    <tbody>
    <!-- Aquí irían tus datos -->
    <?php lista_contactos(); ?>

    </tbody>
</table>
</section>

<?php
include_once 'templates/footer.php';
?>
