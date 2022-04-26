<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<style>

	table{
		width: 50%;
		border: 2px dotted #ff0000;
		margin: auto;
	}

</style>
</head>

	
<body>
	<?php
	
		require("datos_conexion.php");
	
		$conexion=mysqli_connect($db_host,$db_usuario,$db_contra); //Conexion con BBDD
	
		if(mysqli_connect_errno()){		//Mensaje de error BD
		
			echo "Fallo al Conectar A la BBDD";
		
			exit();
		
		}
	
		mysqli_select_db($conexion, $db_nombre) or die ("No se encuentra la BBDD"); //Conexion a tabla con mensaje de error
	
		mysqli_set_charset($conexion, "utf8"); //determinamos uso de caracteres
	
		$consulta="SELECT * FROM contactos_celulares_bps_ddjj where Provincia='Buenos Aires'";
	
		$resulset=mysqli_query($conexion, $consulta); //guardado de array tabla
	
		while($fila=mysqli_fetch_row($resulset)){
	
		
			echo $fila[0] . "  ";
			echo $fila[1] . "  ";
			echo $fila[2] . "  ";
			echo $fila[3] . "  ";
			echo $fila[4] . "  ";
			echo $fila[5] . "  ";
			echo $fila[6] . "  ";
			echo $fila[7] . "  ";
			echo "<br>";
			echo "<br>";
		}
	
		mysqli_close($conexion); //Desconeccion
	
	?>
	
</body>
</html>