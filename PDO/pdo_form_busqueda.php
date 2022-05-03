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
    <form action="pdo_pag_busqueda.php" method="get">
        <table>
            <tr><td>DNI</td><td><input type="text" name="dni"></td></tr>
            <tr><td>APELLIDO</td><td><input type="text" name="apellido"></td></tr>
            <tr><td><input type="submit" name="enviado" value="DALE!"></td></tr>
        </table>

    </form>

</body>
</html>