<?php
include_once 'templates/header.php';
include_once 'templates/lista_de_contactos.php';
?>

<section class="container mt-4">
    <?php
    if (isset($_GET['crud']) && $_GET['crud'] == 'Eliminar') {
        include_once 'templates/popup.php';
    }
    ?>
    <h2>Lista de Contactos</h2>

    <!-- Botón para crear contacto -->
    <a href="gestionar_contacto.php" class="btn btn-primary mt-3">
        ➕ Crear nuevo contacto
    </a>

    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">👤 Nombre</th>
        </tr>
        </thead>
        <tbody>
        <?php lista_contactos(); ?>

        </tbody>
    </table>
</section>

<?php
include_once 'templates/footer.php';
?>
