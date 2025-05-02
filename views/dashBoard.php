<?php
    require_once('../models/MySQL.php');
    $mysql=new Mysql;
    $mysql->conectar();
    $consulta=$mysql->consulta("select idEmpleado,nombre,cedula,nombreCargo,nombreArea,fechaIngreso,salario,estado,correo,telefono from empleado inner join
    cargo on cargo.idCargo = empleado.idCargo inner join area on area.idArea = empleado.idArea where estado=1");

    $mysql->desconectar();
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <div class="row justify-content-center ">
                <div class="col-12 m-3">
                    <?php if(mysqli_num_rows($consulta)>0): ?>
                    <table  class=" table table-secondary table-striped">
                        <thead  >
                            <tr>
                                <th >ID Cliente</th >
                                <th >Nombre</th>
                                <th >Cedula</th>
                                <th >Cargo</th>
                                <th >Area</th>
                                <th >Fecha Ingreso</th>
                                <th >Salario</th>
                                <th >Estado</th>
                                <th >Correo</th>
                                <th >Telefono</th>
                                <!--Las vacías son para que los botones no queden por fuera -->
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody >
                            <?php while($empleado = mysqli_fetch_assoc($consulta)) : ?>
                            <tr>
                                <td><?php echo $empleado['idEmpleado'];?></td>
                                <td><?php echo $empleado['nombre'];?></td>
                                <td><?php echo $empleado['cedula'];?></td>
                                <td><?php echo $empleado['nombreCargo'];?></td>
                                <td><?php echo $empleado['nombreArea'];?></td>
                                <td><?php echo $empleado['fechaIngreso'];?></td>
                                <td><?php echo $empleado['salario'];?></td>
                                <td><?php echo $empleado['estado'];?></td>
                                <td><?php echo $empleado['correo'];?></td>
                                <td><?php echo $empleado['telefono'];?></td>
                                <td></td>
                                <td>
                                    <a href="../controller/eliminarEmpleado.php?idEmpleado=<?php echo $empleado['idEmpleado']; ?>" onclick="return confirm('Estás seguro de eliminar este empleado?');">Eliminar</a>
                                </td>
                                <td>
                                    <a href="editarEmpleado.php?idEmpleado=<?php echo $empleado['idEmpleado'];?>">Editar</a>
                                </td>
                            </tr>
                            <?php endwhile;?>
                        </tbody>
                    </table>
                    <br>
                    <button> <a href="crearEmpleado.php">Crear Empleado</a></button>
                    <?php else: ?>
                        <p>No existen empleados</p>
                    <?php endif; ?>
                </div>
            </div>
          
        </div>
       
    </body>
    </html>
