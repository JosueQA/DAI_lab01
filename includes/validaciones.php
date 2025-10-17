<?php
function validarNombre($nombre) {
    $nombre = trim($nombre);
    if (empty($nombre) || strlen($nombre) < 2) {
        return false;
    }
    return htmlspecialchars($nombre, ENT_QUOTES, 'UTF-8');
}

function validarEmail($email) {
    $email = trim($email);
    return htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
}

function validarTelefono($telefono) {
    $telefono = preg_replace('/\D/', '', $telefono);
    if (strlen($telefono) >= 7 && strlen($telefono) <= 9) {
        return htmlspecialchars($telefono, ENT_QUOTES, 'UTF-8');
    }
    return false;
}
?>