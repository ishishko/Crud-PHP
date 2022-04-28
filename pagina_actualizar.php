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
	
	$consulta="SELECT * FROM datospersonales WHERE dni like '%$busqueda'";
	
	$resulset=mysqli_query($conexion, $consulta); //guardado de array tabla
	
	while($fila=mysqli_fetch_array($resulset, MYSQLI_ASSOC)){ //Array Asociativa
	
		//echo "<table><tr><td>";

		echo "<form action='actualizar.php' method='get'";
		echo "<input type='text' name='dni' value='" . $fila['DNI'] . "'><br>";
		echo "<input type='text' name='dni' value='" . $fila['DNI'] . "'><br>";
		echo "<input type='text' name='nom' value='" . $fila['NOMBRE'] . "'><br>";
		echo "<input type='text' name='ape' value='" . $fila['APELLIDO'] . "'><br>";
		echo "<input type='text' name='eda' value='" . $fila['EDAD'] . "'><br>";

		echo "<input type='submit' name='enviando' value='ACTUALIZAR'>";
		
		echo "</form>";
	}
	
	mysqli_close($conexion); //Desconeccion
	
?>