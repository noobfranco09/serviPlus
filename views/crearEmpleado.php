<?php
require_once "../models/MySQL.php";
$mysql=new Mysql;
$mysql->conectar();
$consulta=$mysql->consulta("select idCargo,nombreCargo from cargo ");
$consulta2=$mysql->consulta("select idArea,nombreArea from area ");
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
    <?php if(mysqli_num_rows($consulta)>0 && mysqli_num_rows($consulta2)>0): ?>
    <div class="container">
        <form action="../controller/crearEmpleado.php" method="POST">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre">
            <br>
            <label for="cedula">Cédula:</label>
            <input type="number" id="cedula" name="cedula">
            <br>
            <label for="cargo">Cargo:</label>
            <select name="idCargo" id="cargo">
            <br>
            <?php while($cargo= mysqli_fetch_assoc($consulta)) : ?>
                <option value="<?php echo $cargo['idCargo']?>"><?php echo $cargo['nombreCargo']?></option>
            <?php endwhile;?>
            </select>
            <br>
            <label for="area">Area:</label>
            <br>
            <select name="idArea" id="area">
                <?php while($area=mysqli_fetch_assoc($consulta2)): ?>
                <option value="<?php echo $area['idArea'] ?>"><?php echo $area['nombreArea'] ?></option>
                <?php endwhile; ?>
            </select>
            <br>
            <label for="fechaIngreso">Fecha de Ingreso:</label>
            <input type="date" id="fechaIngreso" name="fechaIngreso">
            <br>
            <label for="salario">Salario</label>
            <input type="number" id="salario" name="salario">
            <br>
            <label for="correo">Correo</label>
            <input type="text" id="correo" name="correo">
            <br>
            <label for="telefono">Telefono</label>
            <input type="number" id="telefono" name="telefono">
            <br>

            <button type="submit" >Enviar</button>
        </form>

    </div>
    <?php else: ?>
            <p>No existen cargos o areas</p>
    <?php endif; ?>
</body>
</html>