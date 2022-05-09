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
    
    echo "Hola :" . $_SESSION['usuario'] . "<br>";

    ?>
	<p>ESTO ES INFORMACION SOLO PARA USUARIOS</p>
	<p>&nbsp;</p>
	<table width="501" height="175" border="1">
	  <tbody>
	    <tr>
	      <td colspan="3" align="center"><strong><em>ZONA USUARIOS REGISTRADOS</em></strong></td>
        </tr>
	    <tr>
	      <td width="160" align="center"><a href="./usuarios_registrados2.php">Pagina 1</a></td>
	      <td width="159" align="center"><a href="./usuarios_registrados3.php">Pagina 2</a></td>
	      <td width="160" align="center"><a href="./usuarios_registrados4.php">Pagina 3</a></td>
        </tr>
      </tbody>
</table>
	<p>&nbsp;</p>
	<p><a href="./login.php">Cierra SESSION</a></p> 
	
</body>
</html>