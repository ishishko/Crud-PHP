<?php
include_once('./model_registro.php');
include_once('./DDBB.php');


$newcuenta = new Cuenta($db);

if (isset($_POST['crear'])) {
    $usuario = $_POST['user'];
    $pass = $_POST['contra'];

    $listo = $newcuenta->registrar($usuario, $pass);

    if ($listo) {
        header("location:./view_registro_ok.php?user=" . $usuario);
    } else {
        echo "<h2>Error al crear usuario<h2>";
    }
}



include_once("./view_registro.php");
?>

<body>

</body>