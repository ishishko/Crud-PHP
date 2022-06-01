<?php

class Login_model
{
    private $db;


    function __construct()
    {
        require_once("./DDBB.php");
        $this->db;
    }

    public function get_loginuser($user, $pass)
    {
        $user = htmlentities($user);                //Elimina inyeccion de codigo
        $pass = htmlentities($pass);                //Elimina inyeccion de codigo
        $sql = $this->db->query("SELECT ID, USUARIO, PASSWORD FROM USUARIOS2 WHERE USUARIO = '$user'"); //Buscar usuario existente
        $passverified = $sql->fetch(PDO::FETCH_ASSOC);
        if ($sql->rowCount() == 1 && password_verify($pass, $passverified['PASSWORD'])) {               //Verifica Contraseña cifrada
            return true;
        }
        return false;
        /*while ($array = $sql->fetch(PDO::FETCH_ASSOC)) {
            $this->resulset_log[] = $array;
        }*/
    }
}
