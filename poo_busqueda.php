    <?php

    require 'poo_conex.php';

    class Busqueda extends Conex{ //HERENCIA CONEX

        function __construct()
        { 
            parent::__construct();
        }

        function get_buscar(){ //METODO
            $resulset=$this->conexion->query('SELECT * FROM DATOSPERSONALES');
            $busqueda=$resulset->fetch_all(MYSQLI_ASSOC);
            return $busqueda;
        }
    } 


    ?>