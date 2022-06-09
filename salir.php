<?php
setcookie('login', $_SESSION['login'], time() - 1);
session_start();
session_destroy();
header("Location: ./index.php");
