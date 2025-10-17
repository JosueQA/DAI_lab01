<?php
include_once 'templates/header.php';
include_once 'includes/funciones.php';
?>

<section class="container mt-4">

<?php
// 🔍 Si se está visualizando un contacto
if (isset($_GET['id'])) {
    ver_contacto(intval($_GET['id']));
} else {
?>

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
<?php } // 🔚 Fin del else ?>
</section>

<?php
include_once 'templates/footer.php';
?>
