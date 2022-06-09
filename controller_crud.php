<?php
include_once('./model_crud.php');

if (isset($_POST['buscar'])) {
    //setcookie('buscar', true, time() + 300);
    setcookie('num', $_POST['num'], time() + 83000);
    setcookie('nom', $_POST['nom'], time() + 83000);
    setcookie('org', $_POST['org'], time() + 83000);
    setcookie('log', $_POST['loc'], time() + 83000);
    setcookie('pro', $_POST['pro'], time() + 83000);

    $buscar = new CRUD($db);
    $tamaño_p = 25;
    $pagina_actual = 1;
    $resulset = $buscar->getBusqueda($_POST['num'], $_POST['nom'], $_POST['org'], $_POST['loc'], $_POST['pro'], $pagina_actual, $tamaño_p);
    $inicio = $buscar->inicio($pagina_actual, $tamaño_p);
    $filas = $buscar->n_filas($_POST['num'], $_POST['nom'], $_POST['org'], $_POST['loc'], $_POST['pro']);
    setcookie('filas', $filas, time() + 83000);
    $n_paginas = $buscar->n_paginas($_POST['num'], $_POST['nom'], $_POST['org'], $_POST['loc'], $_POST['pro'], $tamaño_p);
    setcookie('n_paginas', $n_paginas, time() + 83000);
} elseif (isset($_GET['pagina_actual'])) {
    if (!isset($_COOKIE['num'])) {
        $num = "";
    } else {
        $num = $_COOKIE['num'];
    }
    if (!isset($_COOKIE['nom'])) {
        $nom = "";
    } else {
        $nom = $_COOKIE['nom'];
    }
    if (!isset($_COOKIE['org'])) {
        $org = "";
    } else {
        $org = $_COOKIE['org'];
    }
    if (!isset($_COOKIE['loc'])) {
        $loc = "";
    } else {
        $loc = $_COOKIE['loc'];
    }
    if (!isset($_COOKIE['pro'])) {
        $pro = "";
    } else {
        $pro = $_COOKIE['pro'];
    }
    $n_paginas = $_COOKIE['n_paginas'];
    $filas = $_COOKIE['filas'];
    $tamaño_p = 25;
    $buscar = new CRUD($db);
    $pagina_actual = $_GET['pagina_actual'];
    $resulset = $buscar->getBusqueda($num, $nom, $org, $loc, $pro, $pagina_actual, $tamaño_p);
    $inicio = $buscar->inicio($pagina_actual, $tamaño_p);
}

if (isset($_GET['id']) && isset($_GET['update'])) {
    $update = new CRUD($db);
    $resulset = $update->getData($_GET['id']);
    foreach ($resulset as $contactos) {
        include_once('./view_update.php');
    }
}
if (isset($_POST['update2'])) {
    $update = new CRUD($db);
    $update->setUpdate($_POST['id'], $_POST['cod'], $_POST['nom'], $_POST['num'], $_POST['tel'], $_POST['loc'], $_POST['pro'], $_POST['org']);
    echo "<h3>Datos Modificados<h3>";
}

if (isset($_GET['id']) && isset($_GET['delete'])) {
    $delete = new CRUD($db);
    $resulset = $delete->getData($_GET['id']);
    foreach ($resulset as $contactos) {
        include_once('./view_delete.php');
    }
}
if (isset($_POST['delete2'])) {
    $delete = new CRUD($db);
    $delete->setDelete($_POST['id']);
    echo "<h3>Datos Modificados<h3>";
}

if (isset($_POST['create'])) {
    include_once('./view_create.php');
}

if (isset($_POST['create2'])) {
    $create = new CRUD($db);
    $create->setCREATE($_POST['cod'], $_POST['nom'], $_POST['num'], $_POST['tel'], $_POST['loc'], $_POST['pro'], $_POST['org']);
    echo "<h3>Biblioteca Cargada<h3>";
}

include_once('./view_crud.php');
