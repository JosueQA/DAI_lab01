<?php

$contacto = buscar_contacto(intval($_GET['id']));

echo '<section class="container mt-4">';
echo '<h2>Visualizar Contacto</h2>';

if ($contacto) {
    echo '<ul class="list-group">';
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
    echo '<a href="../../index.php" class="btn btn-primary mt-3">⬅️ Volver a la lista</a>';
} else {
    echo '<div class="alert alert-warning">Contacto no encontrado.</div>';
}

echo '</section>';
?>