<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

	
<body>
	<?php
	
	$conexion= new mysqli("localhost" ,"root" ,"", "pruebas");

	if ($conexion->connect_errno) {
		echo "Falló la conexión: ", $conexion->connect_errno;
		exit();
	}

	$conexion->set_charset("utf8");

	$sql="SELECT * FROM datospersonales ORDER BY `datospersonales`.`APELLIDO` ASC";

	$resulset=$conexion->query($sql);

	if($conexion->errno){
		die($conexion->error);
	}

	while($fila=$resulset->fetch_assoc()){
		echo "<table><tr><td>";
		echo $fila['DNI'] . "</td><td> ";
		echo $fila['APELLIDO'] . "</td><td> ";
		echo $fila['NOMBRE'] . "</td><td> ";
		echo $fila['EDAD'] . "</td><td></tr></table>";
		echo "<br>";
		echo "<br>";	

	}

	$conexion->close();

	?>
</body>
</html>