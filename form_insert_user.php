<!doctype html>
<html>
<head>
<meta charset='utf-8'>
<title>Documento sin título</title>
<style>
    h1,h2{
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
    .izq{
        text-align: right;
    }
    .der{
        text-align: left;
    }
</style>
</head>
<body>

<h1>Registrar USUARIO</h1>
<form action="./login.php" method="POST" name="formulario">
    <table>
            <tr><td class="der">Usuario :</td><td><input type="text" name="user" id="user"></td></tr>
            <tr><td class="der">Password :</td><td><input type="text" name="contra"></td></tr>
            <tr><td colspan="2"><input type="submit" name="regis" value="REGISTRAR"></td></tr>
    </table>
    </form>




</body>
</html>