<!doctype html>
<html>
<head>
<meta charset='utf-8'>
<title>Documento sin título</title>
<style>
    h1{
        text-align: center;
    }
    table{
        width: 60%;
        margin: auto;
        background-color: #ffc;
        border: 2px solid #f00;
        padding: 5px;
    }

    td{
        text-align: center;
    }
</style>
</head>
<body>
    <h1>Introduce tus DATOS</h1>
    
    <form action="./comprueba_login.php" method="POST" name="formulario">
    <table>
        <tr><td>Usuario :</td><td><input type="text" name="user"></td></tr>
        <tr><td>Password :</td><td><input type="password" name="contra"></td></tr>
        <tr><td colspan="2"><input type="submit" name="logeate" value="LOGIN"></td></tr>
    </table>
    </form>
    
    <?php


    ?>

</body>
</html>