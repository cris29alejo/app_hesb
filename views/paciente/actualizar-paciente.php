<?php include_once __DIR__ . '/../templates/proteger.php'?>
<div class="app">
    <h1 class="nombre-pagina">Actualizar Paciente</h1>
    <p class="descripcion-pagina">Ingresa los datos del paciente para actualizar</p>

    <?php include_once __DIR__ . '/../templates/alertas.php';?>   

    <form class="formulario" method="POST">
        <div class="campo">
            <label for="nombre">Nombre </label>
            <input type="text" name="nombre" id="nombre" placeholder="Ingresar nombre" value="<?php echo s($paciente->nombre);?>">
        </div>
        <div class="campo">
            <label for="apellido">Apellido </label>
            <input type="text" name="apellido" id="apellido" placeholder="Ingresar apellido" value="<?php echo s($paciente->apellido);?>">
        </div>
        <div class="campo">
        <label for="genero">Genero</label>
            <select name="genero" id="genero">
                <option disabled >--Selecciona el genero--</option>
                <option value="1" <?php if(s($paciente->genero) == 1) echo 'selected';?>>Hombre</option>
                <option value="2" <?php if(s($paciente->genero) == 2) echo 'selected';?>>Mujer</option>
            </select>
        </div>
        <div class="campo">
            <label for="edad">Edad </label>
            <input type="number" name="edad" id="edad" placeholder="Ingresar edad" step="1" min="0" max="150" value="<?php echo s($paciente->edad);?>">
        </div>
        <div class="campo">
            <label for="cedula">Cedula </label>
            <input type="text" name="cedula" id="cedula" placeholder="Ingresar cedula" minlength="10" maxlength="10" value="<?php echo s($paciente->cedula);?>">
        </div>
        <div class="campo">
            <label for="fecha_nacimiento">Fecha de nacimiento</label>
            <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" value="<?php echo s($paciente->fecha_nacimiento);?>">
        </div>
        <div class="campo">
            <label for="direccion">Dirección </label>
            <input type="text" name="direccion" id="direccion" placeholder="Ingresar direccion" value="<?php echo s($paciente->direccion);?>">
        </div>
        <div class="campo">
            <label for="telefono">Telefono </label>
            <input type="tel" name="telefono" id="telefono" name="telefono" id="telefono" minlength="7" maxlength="10" placeholder="Ingresar telefono" value="<?php echo s($paciente->telefono);?>">
        </div>
        <input type="submit" class="boton" value="Actualizar Paciente">
    </form>

</div>