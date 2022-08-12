<div class="app">
    <h1 class="nombre-pagina">Crear cuenta</h1>
    <p class="descripcion-pagina">Llena el siguiente formulario para crear una cuenta</p>
    <?php include_once __DIR__ . '/../templates/alertas.php';?>
    <form action="/crear-cuenta" class="formulario" method="POST">
        <div class="campo">
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo s($usuario->nombre);?>">
        </div>
        <div class="campo">
            <label for="apellido">Apellido</label>
            <input type="text" id="apellido" name="apellido" placeholder="Apellido" value="<?php echo s($usuario->apellido);?>">
        </div>
        <div class="campo">
            <label for="telefono">Telefono</label>
            <input type="tel" id="telefono" minlength="7" maxlength="10" name="telefono" placeholder="Telefono" value="<?php echo s($usuario->telefono);?>">
        </div>
        <div class="campo">
            <label for="email">Correo Electrónico</label>
            <input type="email" id="email" name="email" placeholder="Correo electrónico" value="<?php echo s($usuario->email);?>">
        </div>
        <div class="campo"> 
            <label for="password">Contraseña</label>
            <input type="password" id="password" name="password" placeholder="Contraseña" value="<?php echo s($usuario->password);?>">
        </div>
        <input type="submit" class="boton" value="Crear cuenta">
    </form>
    <div class="acciones">
        <a href="/login">¿Ya tienes una cuenta? Iniciar Sesión</a>
        <a href="/olvide">Olvidaste tu Cuenta</a>
    </div>
</div>