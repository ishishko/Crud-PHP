<?php

require_once("./model_login.php");

if (isset($_POST['login'])) {                   //Disparador de funcion Boton Login
    if (isset($_POST['recordar'])) {            //Verifica checkbox
        $log = new Login_model;
        $log = $log->get_loginuser($_POST['user'], $_POST['contra'], 1); //Asignacion de variables para Metodo con checkbox recordar
    } else {
        $log = new Login_model;
        $log = $log->get_loginuser($_POST['user'], $_POST['contra'], 0); //Asignacion de variables para Metodo sin checkbox
    }
}

require_once("./view_login.php");
if (!isset($_SESSION['usuario']) && isset($log)) {
    echo "<h3>" . $log . "</h3>" . $_SESSION['usuario'];
}
