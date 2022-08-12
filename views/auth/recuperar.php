<h1 class="nombre-pagina">Recuperar Contraseña</h1>
<p class="descripcion-pagina">Coloca tu nueva Contraseña a continuación</p>
<?php include_once __DIR__ . '/../templates/alertas.php'?>
<?php if($error) return; ?>
<form class="formulario" method="POST">
    <div class="campo">
        <label for="password">Contraseña</label>
        <input type="password" name="password" id="password" placeholder="Ingresa tu nueva contraseña">
    </div>
    <input type="submit" class="boton" value="Guardar nueva contraseña">
    <div class="acciones">
        <a href="/crear-cuenta">¿Aún no tienes una cuenta? Crear cuenta</a>
        <a href="/olvide">Olvidaste tu Cuenta</a>
    </div>
</form>