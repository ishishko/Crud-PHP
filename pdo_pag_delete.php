<!doctype html>
<html>
<head>
<meta charset='utf-8'>
<title>Documento sin título</title>
</head>
<body>
    <?php

    $bus_dni=$_POST['dni'];
    /*$bus_nom=$_POST['nom'];
    $bus_ape=$_POST['ape'];
    $bus_edad=$_POST['edad'];*/
        
    try{
        $conexion= new PDO('mysql:host=localhost; dbname=pruebas', 'root', '');
        $conexion->setAttribute(pdo::ATTR_ERRMODE, pdo::ERRMODE_EXCEPTION); //Asigna atributo y metodos a objeto $conexion
        $conexion->exec("SET CHARACTER SET utf8");
        //$sql="SELECT DNI, NOMBRE, APELLIDO, EDAD FROM datospersonales WHERE DNI = :n_dni AND APELLIDO=:n_ape";
        //$sql="INSERT INTO datospersonales (DNI, NOMBRE, APELLIDO, EDAD) VALUES (:_DNI, :_NOM, :_APE, :_EDAD)";
        $sql="DELETE FROM datospersonales WHERE DNI=:_DNI";
        $resulset=$conexion->prepare($sql); //Guardado PDOstatement
    $resulset->execute(array(":_DNI"=>$bus_dni /*":_NOM"=>$bus_nom, ":_APE"=>$bus_ape, ":_EDAD"=>$bus_edad*/));
        
        /*while($fila=$resulset->fetch(PDO::FETCH_ASSOC)){
            echo "<table><tr><td>";
            echo $fila['DNI'] . "</td><td> ";
            echo $fila['APELLIDO'] . "</td><td> ";
            echo $fila['NOMBRE'] . "</td><td> ";
            echo $fila['EDAD'] . "</td><td></tr></table>";
            echo "<br>";
        }
        */

        echo "Registro Eliminado";

        $resulset->closeCursor();

    }catch(Exception $e){ //Objeto de Error
        die('ERROR : ' . $e->getMessage());
    }finally{
        $conexion=null;
    }



    ?>

</body>
</html>