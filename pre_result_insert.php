<!doctype html>
<html>
<head>
<meta charset='utf-8'>
<title>Documento sin título</title>
</head>
<body>

    <?php
	
	    require("datos_conexion.php");
		
		$dni=$_GET['dni'];
        $nom=$_GET['nom'];
		$ape=$_GET['ape'];
		$edad=$_GET['edad'];

		$conexion=mysqli_connect($db_host,$db_usuario,$db_contra); //Conexion con BBDD
        
	    
    	if(mysqli_connect_errno()){		//Mensaje de error BD
		
	    		echo "Fallo al Conectar A la BBDD";
		
		    	exit();
		
		}
		
	    mysqli_select_db($conexion, $db_nombre) or die ("No se encuentra la BBDD"); //Conexion a tabla con mensaje de error
		
	    mysqli_set_charset($conexion, "utf8"); //determinamos uso de caracteres
		
		$sql="INSERT INTO datospersonales (DNI, NOMBRE, APELLIDO,EDAD) VALUES (?,?,?,?)";
		$resulset=mysqli_prepare($conexion, $sql); // Objeto mysqli
		$ok=mysqli_stmt_bind_param($resulset,"sssi",$dni, $nom, $ape, $edad);
		$ok=mysqli_stmt_execute($resulset);
		
		if($ok=false){
		
			echo "Error ejecutando CONSULTA";
		
		}else{
			echo "Usuario Guardado: <br><br>";
			echo "DNI:$dni <br> NOMBRE:$nom <br> APELLIDO:$ape <br> EDAD:$edad <br>";
			
			mysqli_stmt_close($resulset);
			}
	
    ?>

</body>
</html>