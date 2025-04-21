<?php
    require_once'../models/MySQL.php';
    $mysql=new Mysql();
    $mysql->conectar();

    $idEmpleado=$_GET['idEmpleado'];
    $consulta="update empleado set estado=0 where idEmpleado='$idEmpleado'";
    $mysql->consulta($consulta);
    echo"Empleado Eliminado";
    $mysql->desconectar();

    header("refresh:3;url=../views/dashBoard.php");
?>