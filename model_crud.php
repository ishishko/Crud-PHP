<?php
include_once("./DDBB.php");

class CRUD
{
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getBusqueda($num, $nom, $org, $loc, $pro, $pagina_actual, $tamaño_p)
    {
        $inicio = self::inicio($pagina_actual, $tamaño_p);
        $query = $this->db->prepare("SELECT ID, Codigo, Nombre, Numero, Telefono, Localidad, Provincia, Organizacion 
            FROM contactos_celulares_bps_ddjj WHERE Numero LIKE '%$num%' AND Nombre LIKE '%$nom%' AND Organizacion 
            LIKE '%$org%' AND Localidad LIKE '%$loc%' AND Provincia LIKE '%$pro%' LIMIT $inicio,$tamaño_p");
        $query->execute();
        $resulset = $query->fetchAll(PDO::FETCH_OBJ);
        $query->closeCursor();
        return $resulset;
    }

    public function n_filas($num, $nom, $org, $loc, $pro)
    {
        $query = $this->db->prepare("SELECT ID, Codigo, Nombre, Numero, Telefono, Localidad, Provincia, Organizacion 
        FROM contactos_celulares_bps_ddjj WHERE Numero LIKE '%$num%' AND Nombre LIKE '%$nom%' AND Organizacion 
        LIKE '%$org%' AND Localidad LIKE '%$loc%' AND Provincia LIKE '%$pro%'");
        $query->execute();
        $n_fila = $query->rowCount();
        $query->closeCursor();
        return $n_fila;
    }

    public function inicio($pagina_actual, $tamaño_p)
    {
        $inicio = ($pagina_actual - 1) * $tamaño_p;
        return $inicio;
    }

    public function n_paginas($num, $nom, $org, $loc, $pro, $tamaño_p)
    {
        $n_fila = self::n_filas($num, $nom, $org, $loc, $pro);
        $n_paginas = ceil($n_fila / $tamaño_p);
        return $n_paginas;
    }

    public function getData($ID)
    {
        $query = $this->db->prepare("SELECT ID, Codigo, Nombre, Numero, Telefono, Localidad, Provincia, Organizacion 
            FROM contactos_celulares_bps_ddjj WHERE ID=$ID");
        $query->execute();
        $resulset = $query->fetchAll(PDO::FETCH_OBJ);
        $query->closeCursor();
        return $resulset;
    }

    public function setUpdate($id, $cod, $nom, $num, $tel, $loc, $pro, $org)
    {
        $query = $this->db->prepare("UPDATE contactos_celulares_bps_ddjj SET Codigo=:cod, Nombre=:nom, Numero=:num, Telefono=:tel,
            Localidad=:loc, Provincia=:pro, Organizacion=:org WHERE Id=:id");
        $query->execute(array(":id" => $id, ":cod" => $cod, ":nom" => $nom, ":num" => $num, ":tel" => $tel, ":loc" => $loc, ":pro" => $pro, ":org" => $org));
        $query->closeCursor();
    }

    public function setInsert($id, $cod, $nom, $num, $tel, $loc, $pro, $org)
    {
        $query = $this->db->prepare("UPDATE contactos_celulares_bps_ddjj SET Codigo=:cod, Nombre=:nom, Numero=:num, Telefono=:tel,
            Localidad=:loc, Provincia=:pro, Organizacion=:org WHERE Id=:id");
        $query->execute(array(":id" => $id, ":cod" => $cod, ":nom" => $nom, ":num" => $num, ":tel" => $tel, ":loc" => $loc, ":pro" => $pro, ":org" => $org));
        $query->closeCursor();
    }

    public function setDelete($id)
    {
        $query = $this->db->prepare("DELETE FROM contactos_celulares_bps_ddjj WHERE Id=$id");
        $query->execute();
        $query->closeCursor();
    }

    public function setCREATE($cod, $nom, $num, $tel, $loc, $pro, $org)
    {
        $query = $this->db->prepare("INSERT INTO `contactos_celulares_bps_ddjj`(`Codigo`, `Nombre`, `Numero`, `Telefono`, `Localidad`, `Provincia`, `Organizacion`) 
            VALUES (:cod, :nom, :num, :tel, :loc, :pro, :org)");
        $query->execute(array(":cod" => $cod, ":nom" => $nom, ":num" => $num, ":tel" => $tel, ":loc" => $loc, ":pro" => $pro, ":org" => $org));
        $query->closeCursor();
    }
}
