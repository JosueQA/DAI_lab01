<form action="procesar_contacto.php" method="post" id="formulario-contacto" enctype="multipart/form-data">
    <!-- Mensajes de estado -->
    <?php if (isset($_GET['exito'])): ?>
        <div class="alert alert-success">Contacto guardado exitosamente</div>

        <!--Limpia la URL sin recargar-->
        <script>
            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.pathname);
            }
        </script>

    <?php endif; ?>

    <?php if (isset($_GET['error'])): ?>
        <div class="alert alert-danger">Error al procesar el formulario</div>
    <?php endif; ?>

    <label for="nombre" class="form-label">👤 Nombre:</label>
    <input type="text" id="nombre" name="nombre" class="form-control" required
           minlength="2" maxlength="50"
           value="<?php echo htmlspecialchars(isset($_POST['nombre']) ? $_POST['nombre'] : ''); ?>">

    <label for="email" class="form-label">📧 Correo electrónico:</label>
    <input type="email" id="email" name="email" class="form-control" required
           value="<?php echo htmlspecialchars(isset($_POST['email']) ? $_POST['email'] : ''); ?>">

    <label for="telefono" class="form-label">📱 Nro de teléfono:</label>
    <input type="tel" id="telefono" name="telefono" class="form-control" required
           pattern="[0-9]{7,9}" title="Ingresa un número válido de 7 a 9 dígitos"
           value="<?php echo htmlspecialchars(isset($_POST['telefono']) ? $_POST['telefono'] : ''); ?>">

    <label for="imagen" class="form-label">Foto del contacto:</label><br>
    <input type="file" id="imagen" name="imagen" accept="image/*" class="form-control"><br>

    <button type="submit" class="btn btn-success mt-3">Guardar</button>
    <button type="reset" class="btn btn-secondary mt-3">Limpiar</button><br><br>
</form>