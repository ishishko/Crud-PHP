<?php

    class Contactos_model
    {
        private $db;
        private $contactos;

        function __construct()
        {
            require_once("./model/conexion.php");
            $this->db=Conectar::conexion();
            $this->contactos=array();
        }

        function getContacto()
        {
            $sql=$this->db->query("SELECT * FROM contactos_celulares_bps_ddjj");

            while($fila=$sql->fetch(PDO::FETCH_ASSOC))
            {
                $this->contactos[]=$fila;
            }
            return $this->contactos;
        }
    }

?>