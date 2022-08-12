<?php include_once __DIR__ . '/../templates/proteger.php'?>
<div class="app">
    <h1 class="nombre-pagina">Actualizar Cita</h1>
    <p class="descripcion-pagina">Ingresa los datos para actualizar la cita</p>
    <?php include_once __DIR__ . '/../templates/alertas.php';?>
    <form class="formulario" method="POST">
        <div class="campo">
            <label for="idpacientes">Pasciente</label>
            <select name="idpacientes" id="idpacientes">
                <option disabled selected>--Selecciona el pasciente--</option>
                <?php foreach($pacientes as $paciente):?>
                <option value="<?php echo $paciente->id?>" <?php if($cita->idpacientes == $paciente->id) echo 'selected';?>><?php echo $paciente->nombre . " " .$paciente->apellido?></option>
                <?php endforeach;?>
            </select>
        </div>
        <div class="campo">
            
            <label for="iddoctores">Doctor</label>
            <select name="iddoctores" id="iddoctores">
                <option disabled selected>--Selecciona el doctor--</option>
                <?php foreach($doctores as $doctor):?>
                <option value="<?php echo $doctor->id?>"<?php if($cita->iddoctores == $doctor->id) echo 'selected';?>><?php echo $doctor->nombre . " " . $doctor->apellido?></option>
                <?php endforeach;?>
            </select>
        </div>
        <div class="campo">
            <label for="fecha">Fecha</label>
            <input type="date" name="fecha" id="fecha" value="<?php echo s($cita->fecha)?>">
        </div>
        <div class="campo">
            <label for="hora">Hora</label>
            <input type="time" name="hora" id="hora" value="<?php echo s($cita->hora)?>">
        </div>
        <div class="campo">
            <label for="precio">Precio</label>
            <input type="number"  step="0.01" name="precio" id="precio" value="<?php echo s($cita->precio)?>">
        </div>

        <input type="submit" class="boton" value="Actualizar Cita">
    </form>

</div>