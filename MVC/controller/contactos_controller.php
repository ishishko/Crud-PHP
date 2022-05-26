<?php

    require_once('./model/contactos_model.php');

    $contactos=new Contactos_model();
    $sqlcontactos=$contactos->getContacto();

    
    
    require_once('./view/contactos_view.php');


?>