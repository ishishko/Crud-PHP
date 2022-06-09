<?php
include_once('./DDBB.php');

class Cuenta
{

    public function __construct($db)                //Constructor con variable de conexion
    {
        $this->db = $db;                            //Establece Conexion
    }

    public function login($usuario, $pass)
    {
        $usuario = htmlentities($usuario);          //Elimina iyeccion SQL
        $pass = htmlentities($pass);
        $query = $this->db->prepare("SELECT ID, USUARIO, PASSWORD FROM usuarios2 WHERE USUARIO = '$usuario'"); //Busca nombre de usuario en bbdd
        $query->execute();
        if ($query->rowCount() == 1) {              //Verifica si se encontro usuario           
            $row = $query->fetch(PDO::FETCH_OBJ);   //Guardamos datos de query en un array de objetos
            $hash = $row->PASSWORD;                 //Grabamos en variable clave hash obtenida en la consulta
            if (password_verify($pass, $hash)) {    //Verifica contraseña
                return true;                        //Devuelve valor buleano
            } else {
                return false;                       //Devuelve valor buleano
            }
        } else {
            return false;                           //Devuelve valor buleano
        }
    }

    public function registrar($usuario, $pass)      //Obtiene variables desde formulario
    {
        $success = $this->insertar($usuario, $pass);    //LLama metodo, pasa variables y obtiene buleano

        if ($success) {                             //Retorna buleano a controller
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
        $query->closeCursor();                      //Desconecta de la BASE
    }
}


?>

<body>
</body>