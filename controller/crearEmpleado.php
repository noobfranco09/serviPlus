<?php
require_once '../models/MySQL.php'; 
require_once './sanitizacionFuncion.php';
$mysql=new Mysql();
$mysql->conectar();


$fotoEmpleado=$_POST['fotoEmpleado'];
$files=[$fotoEmpleado];
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
    
    $consulta=" insert into empleado(nombre,cedula,idCargo,idArea,fechaIngreso,salario,estado,correo,telefono) 
    values('$nombre','$cedula','$cargo','$area','$fechaIngreso','$salario','1','$correo','$telefono'); ";
    $mysql->consulta($consulta);
    $id=$mysql->obtenerUltimoId();//esta función toma el id de la última query , se inserta en la query para insertar la imágen
    //aquí va el código de la imagen
    echo"Registrado con Éxito";
}else{echo"Por vafor, llene los campos correctmene";} 



$mysql->desconectar();
header("refresh:3;url=../views/dashBoard.php");
?>