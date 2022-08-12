<div class="app">
    <h1 class="nombre-pagina">Olvidaste tu contraseña</h1>
    <p class="descripcion-pagina">Restablece tu contraseña escribiendo tu correo electrónico a continuación</p>
    <?php include_once __DIR__ . '/../templates/alertas.php'?>
    
    <form action="/olvide" class="formulario" method="POST">
        <div class="campo">
            <label for="email">Correo Electrónico</label>
            <input type="email" id="email" placeholder="Correo electrónico" name="email">
        </div>
        <input type="submit" class="boton" value="Enviar instrucciones">
    </form>

    <div class="acciones">
        <a href="/login">¿Ya tienes una cuenta? Iniciar Sesión</a>
        <a href="/crear-cuenta">¿Aún no tienes una cuenta? Crear cuenta</a>
    </div>
</div>