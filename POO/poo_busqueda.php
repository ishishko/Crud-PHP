    <?php

    require 'poo_conex.php';

    class Busqueda extends Conex{ //HERENCIA CONEX

        function __construct()
        { 
            parent::__construct();
        }

        function get_buscar($dato) //METODO
        {
        $sql="SELECT * FROM DATOSPERSONALES WHERE DNI='".$dato."' OR NOMBRE='". $dato ."' OR APELLIDO='". $dato . "' OR EDAD='". $dato . "'";
        $sentencia=$this->conexion->prepare($sql);
        $sentencia->execute(array());
        $resulset=$sentencia->fetchAll(pdo::FETCH_ASSOC);
        $sentencia->closeCursor();
        return $resulset;
        $this->conexion=null;
        }
        /*{ 
            $resulset=$this->conexion->query('SELECT * FROM DATOSPERSONALES WHERE DNI="'. $dato . '" OR
            NOMBRE="'. $dato . '" OR APELLIDO="'. $dato . '" OR EDAD="'. $dato . '"');
            $busqueda=$resulset->fetchAll(MYSQLI_ASSOC);
            return $busqueda;
        }*/
    } 


    ?>