<?php
include_once('./DDBB.php');
include_once('./model_login-registro.php');

$inicio = new Cuenta($db);

if (isset($_POST['login'])) {           //verifica si se crea 4_post con boton login
    $usuario = $_POST['user'];          //Guarda variables desde formulario
    $pass = $_POST['contra'];
    $login = $inicio->login($usuario, $pass);   //LLama metodo login de la Instancia $inicio

    if ($login) {                               //Recibe variables boleanas desde metodo logueo
        $_SESSION['login'] = $usuario;          //Guarda Nombre de usuario en sesion global
        if (isset($_POST['record']))             //verifica casilla recordar
            setcookie('login', $usuario, time() + 82400); //Crea cookie con 1 mes de duracion

        header("location:./index");
    } else {
        echo "<h2>Usuario o Contraseña Incorrectos<h2>";
    }
}

if (isset($_POST['crear'])) {           //verifica si se crea 4_post con boton crear
    $usuario = $_POST['user'];          //Guarda variables desde formulario
    $pass = $_POST['contra'];

    $crear = $inicio->registrar($usuario, $pass); //LLama metodo registrar de la Instancia $inicio

    if ($crear) {                       //Recibe variable booleana desde el metodo precedente
        header("location:./view_registro_ok.php?user=" . $usuario);
    } else {
        echo "<h2>Error al crear usuario<h2>";
    }
}



include_once("./view_login-registro.php");
?>

<body>

</body>