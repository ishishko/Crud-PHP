<!doctype html>
<html>
<head>
<meta charset='utf-8'>
<title>Documento sin título</title>
</head>
<body>
    <?php

    $busqueda=$_GET['buscar'];
    
    try{
        $conexion= new PDO('mysql:host=localhost; dbname=pruebas', 'root', '');
        $conexion->setAttribute(pdo::ATTR_ERRMODE, pdo::ERRMODE_EXCEPTION);
        $conexion->exec("SET CHARACTER SET utf8");
        $sql="SELECT DNI, NOMBRE, APELLIDO, EDAD FROM datospersonales WHERE APELLIDO= ? ";
        $resulset=$conexion->prepare($sql); //Guardado PDOstatement
        $resulset->execute(array($busqueda));
        
        while($fila=$resulset->fetch(PDO::FETCH_ASSOC)){
            echo "<table><tr><td>";
            echo $fila['DNI'] . "</td><td> ";
            echo $fila['APELLIDO'] . "</td><td> ";
            echo $fila['NOMBRE'] . "</td><td> ";
            echo $fila['EDAD'] . "</td><td></tr></table>";
            echo "<br>";
        }
        
        $resulset->closeCursor();

    }catch(Exception $e){ //Objeto de Error
        die('ERROR : ' . $e->getMessage());
    }finally{
        $conexion=null;
    }



    ?>

</body>
</html>