<?php
include_once 'templates/header.php';
include_once 'includes/contactos_crud.php';
?>

<!-- Pagina que proyectara el contacto -->
<section class="container mt-4">
    <?php
    if (isset($_GET['id'])) {
        if (isset($_GET['crud'])) {
            if ($_GET['crud'] == 'Editar') {
                editar_contacto(intval($_GET['id']));
            } elseif ($_GET['crud'] == 'Eliminar') {
                eliminar_contacto(intval($_GET['id']));
            }
        } else {
            ver_contacto(intval($_GET['id']));
        }
    } else {
        echo '<div class="alert alert-warning">No se especificó un contacto.</div>';
    }
    ?>
</section>

<?php
include_once 'templates/footer.php';
?>
