<?php

    class Conectar
    {
        public static function conexion()
        {
            try
            {
                $conex= new PDO("mysql:host=localhost; dbname=pruebas", "root", "");
                $conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $conex->exec("SET CHARACTER SET utf8");
            }catch(Exception $e)
            {
                die("ERROR : " . $e->getMessage() . "\/ LINEA :" . $e->getLine());
            }
        return $conex;
        }
    }

?>