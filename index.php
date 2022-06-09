<!doctype html>
<html>

<head>
    <meta charset='utf-8'>
    <title>SILA-VIP</title>

</head>

<body style="background-color:#9EDED8 ;">
    <?php
    session_start();
    if (isset($_SESSION['login']) || (isset($_COOKIE['login']))) {
        include_once('./controller_crud.php');
    } else {
        require_once('./controller_login-registro.php');
    }





    ?>


</body>

</html>