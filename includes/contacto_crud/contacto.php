<?php
include_once '../../templates/header.php';
include_once '../buscar_contacto.php';
?>

<!-- Pagina que proyectara el contacto -->
<section class="container mt-4">
    <?php
    if (isset($_GET['id'])) {
        if (isset($_GET['crud'])) {
            if ($_GET['crud'] == 'Editar') {
                include_once '../../templates/formulario.php';
            } elseif ($_GET['crud'] == 'Eliminar') {
                include_once 'contacto_eliminar.php';
            }
        } else {
            include_once 'contacto_ver.php';
        }
    } else {
        echo '<div class="alert alert-warning">No se especificó un contacto.</div>';
    }
    ?>
</section>

<?php
include_once '../../templates/footer.php';
?>
