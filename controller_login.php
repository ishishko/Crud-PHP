<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    session_destroy();
}
require_once("./model_login.php");

if (isset($_POST['login']) && empty($_POST['user'])) {                   //Disparador de funcion Boton Login
    $log = new Login_model;
    $log = $log->get_loginuser($_POST['user'], $_POST['contra']); //Asignacion de variables para Metodo con checkbox recordar
    if ($log = true) {
        if (isset($_POST['recordar'])) {
            session_start();
            $_SESSION['usuario'] = $_POST['user'];
            setcookie('usuario', $_POST['user'], time() + 82400);
        } else {
            session_start();
            $_SESSION['usuario'] = $_POST['user'];
        }
    }
}
require_once("./view_login.php");


if ($log = false && isset($_POST['user'])) {
    echo "<h3>Usuario o Contraseña Incorrectos</h3>";
}
