<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

	
<body>
	<?php
	
	$db_host="localhost"; //carga de info de BBDD en variables
	$db_nombre="pruebas";
	$db_usuario="root";
	$db_contra="";
	
	$conexion=mysqli_connect($db_host,$db_usuario,$db_contra); //Conexion con BBDD
	
	if(mysqli_connect_errno()){		//Mensaje de error BD
		
		echo "Fallo al Conectar A la BBDD";
		
		exit();
		
	}
	
	mysqli_select_db($conexion, $db_nombre) or die ("No se encuentra la BBDD"); //Conexion a tabla con mensaje de error
	
	mysqli_set_charset($conexion, "utf8"); //determinamos uso de caracteres
	
	$consulta="SELECT * FROM DATOSPERSONALES";
	
	$resultados=mysqli_query($conexion, $consulta);
	
	while($fila=mysqli_fetch_row($resultados)){
	
		//$fila=mysqli_fetch_row($resultados);
	
		echo $fila[0] . "  ";
		echo $fila[1] . "  ";
		echo $fila[2] . "  ";
		echo $fila[3] . "  ";
		echo "<br>";
		echo "<br>";
	}
	
	mysqli_close($conexion);
	
	?>
	
</body>
</html>