<?php include_once __DIR__ . '/../templates/proteger.php'?>
<?php $suma=0;?>
<div class="app">
    <h1 class="nombre-pagina">Citas</h1>    
    <div class="navegacion-nuevo">
        <a href="/crear-cita" class="boton"><i class="fas fa-plus"></i> Nueva cita</a>
    </div>
    <h2 class="nombre ¿-pagina">Buscar cita por fecha</h2>
    <div class="navegacion-nuevo">
        <form method="GET" class="formulario">
            <div class="campo">
                <input type="date" id="fecha" name="fecha" value="<?php if(isset($_GET['fecha'])){ echo $_GET['fecha'];} else{ echo date('Y-m-d');}?>">
                <input type="submit" value="Buscar" class="boton btnBuscar">
            </div>
        </form>
    </div>
    <?php if(!empty($citas)) :?>
    <div class="navegacion-nuevo">
        <table>
           <thead>
            <tr>
                <th>Paciente</th>
                <th>Doctor</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
           </thead>
           <tbody>
                <?php foreach($citas as $cita): ?>
                <tr>
                    <td><?php foreach($pacientes as $paciente) if($paciente->id == $cita->idpacientes) echo $paciente->nombre . " " . $paciente->apellido ;?></td>
                    <td><?php foreach($doctores as $doctor)if($doctor->id == $cita->iddoctores)echo $doctor->nombre . " " . $doctor->apellido;?></td>
                    <td><?php echo $cita->fecha;?></td>
                    <td><?php echo $cita->hora;?></td>
                    <td><?php echo "$ ".$cita->precio; $suma+=$cita->precio?></td>
                    <td>
                        <a href="/actualizar-cita?id=<?php echo s($cita->id)?>" class="boton-editar"><i class="fas fa-edit"></i> Editar</a>
                        <form action="/cita/eliminar" method="POST">
                            <input type="hidden" name="id" value="<?php echo s($cita->id);?>">
                            <input type="submit" class="boton-eliminar" value="Eliminar">
                        </form>
                    </td>
                </tr>
                <?php endforeach;?>
           </tbody>
        </table>
        <?php else: ?>
            <p>--No hay citas para esta fecha--</p>
        <?php endif;?>
    </div>
    <div class="app">
        <?php if($suma != 0): ?>
        <h1 class="nombre-pagina">Honorarios</h1>

        <table>
            <thead>
                <tr>
                    <th><h3>Hospital</h3></th>
                    <th><h3>Doctor</h3></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><h3><?php echo "$ " . $suma * 0.20;?></h3></td>
                    <td><h3><?php echo "$ " . $suma * 0.80;?></h3></td>
                </tr>
                
            </tbody>
        </table>
        <h1 class="nombre-pagina total"><?php echo "TOTAL DE CITAS: $" . $suma;?></h1>
        <?php endif;?>
    </div>
</div>


