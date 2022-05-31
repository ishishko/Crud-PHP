<?php

class DDBB
{
    public static function conexion()
    {
        try {
            $conex = new PDO("mysql:host=localhost; dbname=pruebas; charset=utf8", "root", "");
            $conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conex;
        } catch (Exception $e) {
            die("ERROR : " . $e->getMessage() . " || LINEA :" . $e->getLine());
            exit;
        }
    }
}
