<!doctype html>
<html>
<head>
<meta charset='utf-8'>
<title>Documento sin título</title>
<style>
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
    <form action="pdo_pag_insert.php" method="POST">
        <table>
            <tr><td>DNI</td><td><input type="text" name="dni"></td></tr>
            <tr><td>NOMBRE</td><td><input type="text" name="nom"></td></tr>
            <tr><td>APELLIDO</td><td><input type="text" name="ape"></td></tr>
            <tr><td>EDAD</td><td><input type="text" name="edad"></td></tr>
            <tr><td><input type="submit" name="enviado" value="INSERTAR"></td></tr>
        </table>
    </form>

</body>
</html>