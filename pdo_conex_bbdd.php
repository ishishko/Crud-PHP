<!doctype html>
<html>
<head>
<meta charset='utf-8'>
<title>Documento sin título</title>
</head>
<body>
    <?php

    try{
        $conexion= new PDO('mysql:host=localhost; dbname=pruebas', 'root', '');
        echo "Conexion OK";
    }catch(Exception $e){ //Objeto de Error
        die('ERROR : ' . $e->getMessage());
    }finally{
        $conexion=null;
    }



    ?>

</body>
</html>