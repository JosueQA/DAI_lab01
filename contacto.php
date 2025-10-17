<?php
include_once 'templates/header.php';
include_once 'includes/funciones.php';
?>

<section class="container mt-4">
    <?php
    if (isset($_GET['id'])) {
        ver_contacto(intval($_GET['id']));
    } else {
        echo '<div class="alert alert-warning">No se especificó un contacto.</div>';
    }
    ?>
</section>

<?php
include_once 'templates/footer.php';
?>
