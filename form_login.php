<!doctype html>
<html>
<head>
<meta charset='utf-8'>
<title>Documento sin título</title>
<style>
    .cen{
        text-align: center;
    }
    .izq{
        text-align: right;
    }
    .der{
        text-align: left;
    }
</style>
</head>
<body>
        
    <h1>LOGIN USUARIOS</h1>    
    <form action="./login.php" method="POST" name="login">
    <table>
            <tr><td class="izq">Usuario :</td><td><input type="text" name="user"></td></tr>
            <tr><td class="izq">Password :</td><td><input type="password" name="contra"></td></tr>
            <tr><td class="izq">Recordar :</td><td class="der"><input type="checkbox" name="recordar" id="recordar"></td></tr>
            <tr><td class="izq"><input type="submit" name="crear" value="CREAR"></td><td class="cen"><input type="submit" name="login" value="LOGIN"></td></tr>
    </table>
    </form>


</body>
</html>