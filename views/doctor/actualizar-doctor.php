<?php include_once __DIR__ . '/../templates/proteger.php'?>
<div class="app">
    <h1 class="nombre-pagina">Actualizar Doctor</h1>
    <p class="descripcion-pagina">Ingresa los datos para actualizar el doctor</p>
    <?php include_once __DIR__ . '/../templates/alertas.php';?>
    <form class="formulario" method="POST">
        <div class="campo">
            <label for="nombre">Nombre </label>
            <input type="text" name="nombre" id="nombre" placeholder="Ingresar nombre" value="<?php echo s($doctor->nombre);?>">
        </div>
        <div class="campo">
            <label for="apellido">Apellido </label>
            <input type="text" name="apellido" id="apellido" placeholder="Ingresar apellido" value="<?php echo s($doctor->apellido);?>">
        </div>
        <div class="campo">
            <label for="especialidad">Especialidad </label>
            <input type="text" name="especialidad" id="especialidad" placeholder="Ingresar especialidad" value="<?php echo s($doctor->especialidad);?>">
        </div>
        <div class="campo">
            <label for="direccion">Dirección </label>
            <input type="text" name="direccion" id="direccion" placeholder="Ingresar direccion" value="<?php echo s($doctor->direccion);?>">
        </div>
        <div class="campo">
            <label for="telefono">Telefono </label>
            <input type="tel" name="telefono" id="telefono" minlength="7" maxlength="10" placeholder="Ingresar telefono" value="<?php echo s($doctor->telefono);?>">
        </div>
        <input type="submit" class="boton" value="Actualizar Doctor">
    </form>

</div>