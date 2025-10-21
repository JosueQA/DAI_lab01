<?php
$contacto = buscar_contacto(intval($_GET['id']));

echo '<section class="container mt-4">';
echo '<h2 class="centrar">Visualizar Contacto</h2>';

if ($contacto) {
    echo '<ul class="list-group centrar">';
    echo '<li class="list-group-item"><strong>Nombre:</strong> ' . htmlspecialchars($contacto[1]) . '</li>';
    echo '<li class="list-group-item"><strong>Correo:</strong> ' . htmlspecialchars($contacto[2]) . '</li>';
    echo '<li class="list-group-item"><strong>Teléfono:</strong> ' . htmlspecialchars($contacto[3]) . '</li>';
    echo '<li class="list-group-item"><strong>Foto:</strong><br>';
    if (!empty($contacto[4])) {
        echo '<img src="../../assets/imagenes/' . htmlspecialchars($contacto[4]) . '" alt="Foto" style="width:100px; border-radius:8px;">';
    } else {
        echo 'Sin foto';
    }
    echo '</li>';
    echo '</ul>';

    // Botones de acción
    echo '<div class="mt-3 centrar">';
    echo '<a href="contacto.php?id=' . intval($_GET['id']) . '&crud=Editar" class="btn btn-warning me-2">Editar</a>';
    echo '<a href="../../index.php?id=' . intval($_GET['id']) . '&crud=Eliminar&popup=Enabled" class="btn btn-danger">Eliminar</a>';    echo '</div>';

    echo '<a href="../../index.php" class="btn btn-primary mt-3 centrar">⬅️ Volver a la lista</a>';
} else {
    echo '<div class="alert alert-warning">Contacto no encontrado.</div>';
}

echo '</section>';
?>
