<?php
include_once('./DDBB.php');

class Cuenta
{

    public function __construct($db)                //Constructor con variable de conexion definida
    {
        $this->db = $db;
    }

    public function registrar($usuario, $pass)      //Obtiene variables desde formulario
    {
        $success = $this->insertar($usuario, $pass);           //LLama metodo, pasa bariables y obtiene buleano

        if ($success) {                                         //Retorna buleano a controller
            return true;
        } else {
            return false;
        }
    }

    private function insertar($usuario, $pass)      //funcion solo accesible dentro de clase
    {
        $usuario = htmlentities($usuario);          //Elimina iyeccion SQL
        $pass = htmlentities($pass);
        $pass = password_hash($pass, PASSWORD_DEFAULT, array('cost' => 11)); //cifrado Password
        $query = $this->db->prepare("INSERT INTO usuarios2 (USUARIO ,PASSWORD) VALUES ('$usuario', '$pass' )"); //query preparada
        return $query->execute();                   //retorna valor true o false a registrar si realiza la accion
        $query->closeCursor();
    }
}


?>

<body>
</body>