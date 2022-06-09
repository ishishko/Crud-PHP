<?php

try {
    $db = new PDO("mysql:host=localhost; dbname=pruebas; charset=utf8", "root", "");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $db;
} catch (Exception $e) {
    die("ERROR : " . $e->getMessage() . " || LINEA :" . $e->getLine());
    exit;
}
