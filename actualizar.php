<!doctype html>
<html>
<head>
<meta charset='utf-8'>
<title>Documento sin título</title>
</head>
<body>
    <?php
	
        
        require("datos_conexion.php"); //Solicita datos de conexion

        $dni=$_GET["dni"];
        $nom=$_GET["nom"];
        $ape=$_GET["ape"];
        $eda=$_GET["eda"];

        $conexion=mysqli_connect($db_host,$db_usuario,$db_contra); //Conexion con BBDD
        
        if(mysqli_connect_errno()){		//Mensaje de error BD
            
                echo "Fallo al Conectar A la BBDD";
            
                exit();
            
        }
        
        mysqli_select_db($conexion, $db_nombre) or die ("No se encuentra la BBDD"); //Conexion a tabla con mensaje de error
        
        mysqli_set_charset($conexion, "utf8"); //determinamos uso de caracteres
        
        $consulta="UPDATE datospersonales SET NOMBRE='$nom', APELLIDO='$ape', EDAD='$eda' WHERE DNI='$dni'";
        
        $resulset=mysqli_query($conexion, $consulta); //guardado de array tabla
        
        if($resulset==false){
           
            echo "ERROR en el GUARDADO";

        }else{

            echo "Registro GUARDADO<br><br>" . "DNI   : $dni<br>" . "NOMBRE : $nom<br>" . "APELLIDO: $ape<br>" . "EDAD    : $eda<br>";
            
        }
        mysqli_close($conexion); //Desconeccion
    
        
    ?>
    
</body>
</html>