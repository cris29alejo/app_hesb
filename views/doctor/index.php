<?php include_once __DIR__ . '/../templates/proteger.php'?>
<div class="app">
    <h1 class="nombre-pagina">Lista de doctores</h1>
    <div class="navegacion-nuevo">
        <a href="/crear-doctor" class="boton"><i class="fas fa-plus"></i> Nuevo doctor</a>
    </div>
    <div class="navegacion-nuevo">
        <table>
           <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Especialidad</th>
                <th>Direccion</th>
                <th>Telefono</th>
                <th>Acciones</th>
            </tr>
           </thead>
           <tbody>
                <?php foreach($doctores as $doctor): ?>
                <tr>
                    <td><?php echo $doctor->nombre;?></td>
                    <td><?php echo $doctor->apellido;?></td>
                    <td><?php echo $doctor->especialidad;?></td>
                    <td><?php echo $doctor->direccion;?></td>
                    <td><?php echo $doctor->telefono;?></td>
                    <td>
                        <a href="/actualizar-doctor?id=<?php echo s($doctor->id)?>" class="boton-editar"><i class="fas fa-edit"></i> Editar</a>
                        <form action="/doctor/eliminar" method="POST">
                            <input type="hidden" name="id" value="<?php echo s($doctor->id);?>">
                            <input type="submit" class="boton-eliminar" value="Eliminar">
                        </form>
                    </td>
                </tr>
                <?php endforeach;?>
           </tbody>
        </table>
    </div>
</div>