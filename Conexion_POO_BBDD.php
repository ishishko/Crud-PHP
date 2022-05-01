<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

	
<body>
	<?php
	
	$conexion= new mysqli("localhost" ,"root" ,"", "pruebas");

	$if($conexion->connect_errno){
		echo "Fallo CONEXION " . $conexion->connect_errno;
	}

	$conexion->set_charset("utf8");

	$sql="SELECT * FROM datospersonales";

	$resulset=$conexion->query($sql);

	if($conexion->errno){
		die($conexion->error);
	}

	while($fila=$resulset->fetch_assoc()){
		
	}

	?>
</body>
</html>