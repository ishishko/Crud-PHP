<?php
	
    $busqueda=$_GET["buscar"];

	require("datos_conexion.php");

    $conexion=mysqli_connect($db_host,$db_usuario,$db_contra); //Conexion con BBDD
	
	if(mysqli_connect_errno()){		//Mensaje de error BD
		
			echo "Fallo al Conectar A la BBDD";
		
			exit();
		
		}
	
	mysqli_select_db($conexion, $db_nombre) or die ("No se encuentra la BBDD"); //Conexion a tabla con mensaje de error
	
	mysqli_set_charset($conexion, "utf8"); //determinamos uso de caracteres
	
	$consulta="SELECT * FROM contactos_celulares_bps_ddjj WHERE ORGANIZACION like '%$busqueda'";
	
	$resulset=mysqli_query($conexion, $consulta); //guardado de array tabla
	
	while($fila=mysqli_fetch_array($resulset, MYSQLI_ASSOC)){ //Array Asociativa
	
		echo "<table><tr><td>";
		echo $fila['Numero'] . "</td><td> ";
		echo $fila['Codigo'] . "</td><td> ";
		echo $fila['Nombre'] . "</td><td> ";
		echo $fila['Organizacion'] . "</td><td> ";
		echo $fila['Provincia'] . "</td><td></tr></table>";
		echo "<br>";
		echo "<br>";
	}
	
	mysqli_close($conexion); //Desconeccion
	
?>