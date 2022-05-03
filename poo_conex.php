    <?php

    require ('poo_config.php');

    class Conex{ //CLASE CONEX
        protected $conexion;
        
        function __construct()
        {
            try
            {
            $this->conexion=new PDO('mysql:host=localhost; dbname=pruebas', 'root', '');
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, pdo::ERRMODE_EXCEPTION);
            $this->conexion->exec("SET CHARACTER SET utf8");
            return $this->conexion;
            }catch(Exception $e){
            echo "La linea de ERROR es" . $e->getLine();
            }
        }
        
        /*
        {
            $this->conexion= new mysqli(DB_HOST, DB_USUARIO, DB_CONTRA, DB_NOMBRE);
            
            if($this->conexion->connect_errno)
            {
                echo "Fallo al CONECTAR :" . $this->conexion->connect_errno;
                return;
            }

            $this->conexion->set_charset('DB_CHARSET');

        }*/
    }

    ?>