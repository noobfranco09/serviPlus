<?php 
require_once '../models/MySQL.php';
$mysql=new Mysql;
$mysql->conectar();


if (isset($_FILES['fotoEmpleado']) && $_FILES['fotoEmpleado']['error'] === UPLOAD_ERR_OK) {
    $permitidos = ['image/jpeg' => '.jpg', 'image/png' => '.png'];
    $tipo = mime_content_type($_FILES['fotoEmpleado']['tmp_name']);
    
    if (!array_key_exists($tipo, $permitidos)) {
    die("Solo se permiten imágenes JPG y PNG.");
    }
    
    $ext = $permitidos[$tipo];
    $nombreUnico = 'imagen_' . date('Ymd_Hisv') . $ext;
    $ruta = 'assets/images/' . $nombreUnico;
    $rutaAbsoluta = __DIR__ . '/../' . $ruta;
    
    if (move_uploaded_file($_FILES['fotoEmpleado']['tmp_name'], $rutaAbsoluta)) {
    $mysql->consulta("INSERT INTO imagenEmpleado (url,idEmpleado) VALUES ('$ruta',2)");
    header("Location: ../index.php");
    } else {
    echo "Error al guardar la imagen.";
    }
    } else {
    echo "No se seleccionó una imagen válida.";
    }
?>