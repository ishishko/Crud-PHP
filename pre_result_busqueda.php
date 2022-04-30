<!doctype html>
<html>
<head>
<meta charset='utf-8'>
<title>Documento sin título</title>
</head>
<body>

    <?php
	
	    require("datos_conexion.php");
		$dni=$_GET['buscar'];
        
		$conexion=mysqli_connect($db_host,$db_usuario,$db_contra); //Conexion con BBDD
        
	    $busqueda=mysqli_real_escape_string($conexion, $_GET["buscar"]);
	    
    	if(mysqli_connect_errno()){		//Mensaje de error BD
		
	    		echo "Fallo al Conectar A la BBDD";
		
		    	exit();
		
		}
		
	    mysqli_select_db($conexion, $db_nombre) or die ("No se encuentra la BBDD"); //Conexion a tabla con mensaje de error
		
	    mysqli_set_charset($conexion, "utf8"); //determinamos uso de caracteres
		
		$sql="SELECT * FROM datospersonales WHERE DNI= ?";
		$resulset=mysqli_prepare($conexion, $sql); // Objeto mysqli
		$ok=mysqli_stmt_bind_param($resulset,"s",$dni);
		$ok=mysqli_stmt_execute($resulset);
		
		if($ok=false){
		
			echo "Error ejecutando CONSULTA";
		
		}else{

			$ok=mysqli_stmt_bind_result($resulset, $dniok, $nombreok, $apellidook, $edadok);
			echo "Usuarios Encontrados: <br><br>";

			while(mysqli_stmt_fetch($resulset)){

				echo "DNI:$dniok  NOMBRE:$nombreok  APELLIDO:$apellidook  EDAD:$edadok <br>";

			}
			
			mysqli_stmt_close($resulset);
		}
	
    ?>

</body>
</html>