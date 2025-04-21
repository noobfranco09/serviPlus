<?php 
    require_once("../models/MySQL.php");
    require_once("./sanitizacionFuncion.php");
    $mysql= new Mysql();
    $mysql->conectar();

    $idEmpleado=$_POST['idEmpleado'];
    $nombre=$_POST['nombre'];
    $cedula=$_POST['cedula'];
    $cargo=$_POST['idCargo'];
    $area=$_POST['idArea'];
    $fechaIngreso=$_POST['fechaIngreso'];
    $salario=$_POST['salario'];
    $correo=$_POST['correo'];
    $telefono=$_POST['telefono'];


    $respuesta=sanitizarFormulario($nombre,$cedula,$cargo,$area,$fechaIngreso,$salario,$correo,$telefono);
    $longitud=count($respuesta);
    if($longitud>0)
    {
        $nombre=$respuesta[0];
        $cedula=$respuesta[1];
        $cargo=$respuesta[2];
        $area=$respuesta[3];
        $fechaIngreso=$respuesta[4];
        $salario=$respuesta[5];
        $correo=$respuesta[6];
        $telefono=$respuesta[7];
    
        $consulta=" update empleado set nombre='$nombre',cedula='$cedula',idCargo='$cargo',idArea='$area',
        fechaIngreso='$fechaIngreso',salario='$salario',estado='1',correo='$correo',telefono='$telefono' where idEmpleado='$idEmpleado'; ";
    
    $mysql->consulta($consulta);
    echo"Actualizado con éxito";
    }else{echo"Por vafor, llene los campos correctmene";}

    $mysql->desconectar();
    header("refresh:3;url=../views/dashBoard.php");
?>