<div class="app">
    <h1 class="nombre-pagina">Iniciar Sesión</h1>
    <p class="descripcion-pagina">Inicia sesion con tus datos</p>

    <?php include_once __DIR__ . '/../templates/alertas.php'?>

    <form action="/login" class="formulario" method="POST">
        <div class="campo">
            <label for="email">Correo Electrónico</label>
            <input type="email" id="email" placeholder="Correo electrónico" name="email">
        </div>
        <div class="campo">
            <label for="password">Constraseña</label>
            <input type="password" placeholder="Contraseña" name="password">
        </div>

        <input type="submit" class="boton" value="Iniciar Sesión">
    </form>

    <div class="acciones">
        <a href="/crear-cuenta">¿Aún no tienes una cuenta? Crear cuenta</a>
        <a href="/olvide">Olvidaste tu Cuenta</a>
    </div>
</div>