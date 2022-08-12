<?php include_once __DIR__ . '/../templates/proteger.php'?>
<div class="app">
    <h1 class="nombre-pagina">Pacientes</h1>    
    <div class="navegacion-nuevo">
        <a href="/crear-paciente" class="boton"><i class="fas fa-plus"></i> Nuevo paciente</a>
    </div>
    <div class="navegacion-nuevo">   
        <table>
           <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Genero</th>
                <th>Edad</th>
                <th>Cedula</th>
                <th>Fecha de nacimiento</th>
                <th>Dirección</th>
                <th>Telefono</th>
                <th>Acciones</th>
            </tr>
           </thead>
           <tbody>
                <?php foreach($pacientes as $paciente): ?>
                <tr>
                    <td><?php echo $paciente->nombre;?></td>
                    <td><?php echo $paciente->apellido;?></td>
                    <?php if($paciente->genero == 1) echo '<td>Hombre</td>';?>
                    <?php if($paciente->genero == 2) echo '<td>Mujer</td>';?>
                    <td><?php echo $paciente->edad;?></td>
                    <td><?php echo $paciente->cedula;?></td>
                    <td><?php echo $paciente->fecha_nacimiento;?></td>
                    <td><?php echo $paciente->direccion;?></td>
                    <td><?php echo $paciente->telefono;?></td>
                    <td>
                        <a href="/actualizar-paciente?id=<?php echo s($paciente->id)?>" class="boton-editar"><i class="fas fa-edit"></i> Editar</a>
                        <form action="/paciente/eliminar" method="POST">
                            <input type="hidden" name="id" value="<?php echo s($paciente->id);?>">
                            <input type="submit" class="boton-eliminar" value="Eliminar">
                        </form>
                    </td>
                </tr>
                <?php endforeach;?>
           </tbody>
        </table>
    </div> 
</div>