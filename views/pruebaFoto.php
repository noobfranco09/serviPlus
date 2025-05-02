<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="../controller/pruebaFoto.php" method="POST" enctype="multipart/form-data">
        
        <input type="file" id="fotoEmpleado" name="fotoEmpleado" accept=".jpg,.jpeg,.png" required>
        <button type="submit" >Enviar</button>
    </form>
</body>
</html>