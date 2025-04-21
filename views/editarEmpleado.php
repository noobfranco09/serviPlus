<?php
    require_once("../models/MySQL.php");
    if (!isset($_GET['idEmpleado'])) 
    {
        echo"Id de empleado no especificado";
        exit();


    }

    $idEmpleado=$_GET['idEmpleado'];

    $mysql = new Mysql();
    $mysql->conectar();

    $cargo=$mysql->consulta("select nombreCargo from empleado inner join cargo on empleado.idCargo=cargo.idCargo where idEmpleado= '$idEmpleado'");

    $resultado=$mysql->consulta("select*from empleado where idEmpleado='$idEmpleado'");
    $consulta=$mysql->consulta("select idCargo,nombreCargo from cargo ");
    $consulta2=$mysql->consulta("select idArea,nombreArea from area ");
    $empleado=mysqli_fetch_assoc($resultado);
    $mysql->desconectar();

    if (!$empleado)
    {
        echo "La consulta falló";
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/estilo.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6 mt-3">

                <form action="../controller/editarEmpleado.php" method="POST" id="formularioEditar">
                        <input type="hidden" id="idEmpleado" name="idEmpleado" class="form-control" value="<?php echo $empleado['idEmpleado'];?>">
                        <div class="row justify-content-center">
                            <div class="col-12 text-center">
                                <h2>EDITAR EMPLEADO</h2>
                            </div>
                        </div>
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre:</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo $empleado['nombre']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="cedula" class="form-label">Cédula:</label>
                        <input type="number" id="cedula" name="cedula" class="form-control" value="<?php echo $empleado['cedula']; ?>">
                    </div>

                    <div class="mb-3">
                        <label for="idCargo" class="form-label">Cargo:</label>
                        <br>
                        <select name="idCargo" id="cargo" class="form-select">
                        <?php while($cargo= mysqli_fetch_assoc($consulta)) : ?>
                            <option value="<?php echo $cargo['idCargo']?>"> <?php echo $cargo['nombreCargo']?> </option>
                            
                        <?php endwhile;?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="idArea" class="form-label">Area:</label>
                        <br>
                        <select name="idArea" id="area" class="form-select">
                            <?php while($area=mysqli_fetch_assoc($consulta2)): ?>
                            <option value="<?php echo $area['idArea'] ?>"><?php echo $area['nombreArea'] ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>

                    
                    <div class="mb-3">
                        <label for="fechaIngreso" class="form-label">Fecha de Ingreso:</label>
                        <input type="date" id="fechaIngreso" name="fechaIngreso" class="form-control" value="<?php echo $empleado['fechaIngreso']; ?>">
                    </div>

                    <div class="mb-3">
                        <label for="salario" class="form-label">Salario</label>
                        <input type="number" id="salario" name="salario" class="form-control" value="<?php echo $empleado['salario']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="correo" class="form-label">Correo</label>
                        <input type="text" id="correo" name="correo" class="form-control" value="<?php echo $empleado['correo']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="telefono" class="form-label">Telefono</label>
                        <input type="number" id="telefono" name="telefono" class="form-control" value="<?php echo $empleado['telefono']; ?>">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary" >Enviar</button>
                    </div>

                </form>

            </div>
        </div>
    </div>

</body>
</html>