<!doctype html>
<html>
<head>
<meta charset='utf-8'>
<title>Documento sin título</title>
</head>
<body>
    <?php
	
        
        require("datos_conexion.php"); //Solicita datos de conexion

        $nif=$_GET["nif"];
        $nom=$_GET["nombre"];
        $ape=$_GET["ape"];
        $eda=$_GET["edad"];

        $conexion=mysqli_connect($db_host,$db_usuario,$db_contra); //Conexion con BBDD
        
        if(mysqli_connect_errno()){		//Mensaje de error BD
            
                echo "Fallo al Conectar A la BBDD";
            
                exit();
            
            }
        
        mysqli_select_db($conexion, $db_nombre) or die ("No se encuentra la BBDD"); //Conexion a tabla con mensaje de error
        
        mysqli_set_charset($conexion, "utf8"); //determinamos uso de caracteres
        
        $consulta="INSERT INTO datospersonales (NIF, NOMBRE, APELLIDO, EDAD) VALUES ('$nif', '$nom', '$ape', $eda)";
        
        $resulset=mysqli_query($conexion, $consulta); //guardado de array tabla
        
        if($resulset==false){
           
            echo "ERROR en el GUARDADO";

        }else{

            echo "Registro GUARDADO<br><br>" . "$nif<br>" . "$nom<br>" . "$ape<br>" . "$eda<br>";
            
        }
        mysqli_close($conexion); //Desconeccion
    
        
    ?>
    
</body>
</html>