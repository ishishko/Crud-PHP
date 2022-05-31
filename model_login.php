<?php

class Login_model
{
    public $_SESSION;
    private $db;
    private $resulset_log;
    private $incorect;

    function __construct()
    {
        require_once("./DDBB.php");
        $this->db = DDBB::conexion();
        $this->resulset_log = array();
        $this->incorect;
    }

    function get_loginuser($user, $pass, $recordar)
    {
        $user = htmlentities($user);                //Elimina inyeccion de codigo
        $pass = htmlentities($pass);                //Elimina inyeccion de codigo

        $sql = $this->db->query("SELECT ID, USUARIO, PASSWORD FROM USUARIOS2 WHERE USUARIO = '$user'"); //Buscar usuario existente
        $passverified = $sql->fetch(PDO::FETCH_ASSOC);
        if ($sql->rowCount() == 1 && password_verify($pass, $passverified['PASSWORD'])) {
            if ($recordar == 1) {
                session_start();
                $_SESSION['usuario'] = $user;
                setcookie("usuario", $user, time() + 8240);
                return $this->$_SESSION['usuario'];
            } elseif ($recordar == 0) {
                session_start();
                $_SESSION['usuario'] = $user;
                return $this->$_SESSION['usuario'];
            }
        } elseif ($sql->rowCount() == 0) {
            $incorect = "USUARIO o CONTRASEÑA Incorrectas";
            return $this->incorect;
        } else {
            $incorect = "ERROR en USUARIO || LLAMAR A SOPORTE";
            return $incorect;
        }
        /*while ($array = $sql->fetch(PDO::FETCH_ASSOC)) {
            $this->resulset_log[] = $array;
        }*/
    }
}
