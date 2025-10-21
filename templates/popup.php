<div class="popup_padre">
    <div class="card-body popup" style="text-align: center;">
        <h5 class="card-title" style="max-width: 275px">
            ¿Seguro que deseas eliminar a
            <?php
            include_once 'includes/buscar_contacto.php';
            $contacto = buscar_contacto(intval($_GET['id']));
            echo '" ' . $contacto[1] . ' "';
            ?>
            ?
        </h5>
        <p class="card-text">
        </p>
        <?php
            if (!empty($contacto[4])) {
                echo '
                <img class="center" src="assets/imagenes/' . htmlspecialchars($contacto[4]) . '" alt="Foto" style="width:100px; border-radius:8px;">
                <br><br>
                ';
            }
        ?>
        <button
            class="btn btn-light btn-sm me-2 btn-confirmar"
            onclick="window.location.href='includes/contacto_crud/contacto.php?id=<?php echo $_GET['id']; ?>&crud=Eliminar'">
            Si
        </button>
        <button
            class="btn btn-light btn-sm"
            onclick="window.location.href='index.php'">
            No
        </button>
    </div>
</div>
