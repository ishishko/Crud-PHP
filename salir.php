<?php
    session_start();
    session_destroy();
    setcookie("usuario",$_POST["user"],time()-1);
    header("Location: ./login.php");
?>