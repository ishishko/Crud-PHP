<!doctype html>
<html>
<head>
<meta charset='utf-8'>
<title>Documento sin título</title>
</head>
<body>
    <?php
    session_start();
    if(!isset($_SESSION['usuario'])){ //Comprobacion sesion iniciada
        header('location:login.php');
    }


    ?>
    <h1>BIENVENIDOS USUARIOS</h1>
    <?php
    
    echo "USUARIO : " . $_SESSION['usuario'] . "<br>";

    ?>
    </p>
    <p>&nbsp;</p>
    <p><a href="usuarios_registrados1.php">Volver</a></p>
    <p>&nbsp;</p>
	<p><a href="./login.php">Cierra SESSION</a></p>
</body>
</html>