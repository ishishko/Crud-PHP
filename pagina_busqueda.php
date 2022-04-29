<?php
	
	require("datos_conexion.php");

    $conexion=mysqli_connect($db_host,$db_usuario,$db_contra); //Conexion con BBDD
	
	$busqueda=mysqli_real_escape_string($conexion, $_GET["buscar"]);
	
	if(mysqli_connect_errno()){		//Mensaje de error BD
		
			echo "Fallo al Conectar A la BBDD";
		
			exit();
		
		}
	
	mysqli_select_db($conexion, $db_nombre) or die ("No se encuentra la BBDD"); //Conexion a tabla con mensaje de error
	
	mysqli_set_charset($conexion, "utf8"); //determinamos uso de caracteres
	
	$consulta="SELECT * FROM datospersonales WHERE DNI like '%$busqueda'";
	
	$resulset=mysqli_query($conexion, $consulta); //guardado de array tabla
	
	while($fila=mysqli_fetch_array($resulset, MYSQLI_ASSOC)){ //Array Asociativa
	
		echo "<table><tr><td>";
		echo $fila['DNI'] . "</td><td> ";
		echo $fila['NOMBRE'] . "</td><td> ";
		echo $fila['APELLIDO'] . "</td><td> ";
		echo $fila['EDAD'] . "</td><td></tr></table>";
		echo "<br>";
		echo "<br>";
	}
	
	mysqli_close($conexion); //Desconeccion
	
?>