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
        text-align: left;
    }
    .der{
        text-align: right;
    }
</style>
</head>
<body>
        
    <h1>LOGIN USUARIOS</h1>    
    <form action="./login.php" method="POST" name="login">
    <table>
            <tr><td class="der">Usuario :</td><td><input type="text" name="user"></td></tr>
            <tr><td class="der">Password :</td><td><input type="password" name="contra"></td></tr>
            <tr><td class="der">Recordar :</td><td class="izq"><input type="checkbox" name="recordar" id="recordar"></td></tr>
            <tr><td class="der"><input type="submit" name="crear" value="CREAR"></td><td class="cen"><input type="submit" name="login" value="LOGIN"></td></tr>
    </table>
    </form>


</body>
</html>