    <?php

    require ('poo_config.php');

    class Conex{ //CLASE CONEX
        protected $conexion;
        
        function __construct()
        {
            $this->conexion= new mysqli(DB_HOST, DB_USUARIO, DB_CONTRA, DB_NOMBRE);
            
            if($this->conexion->connect_errno)
            {
                echo "Fallo al CONECTAR :" . $this->conexion->connect_errno;
                return;
            }

            $this->conexion->set_charset('DB_CHARSET');

        }
    }

    ?>