<!doctype html>
<html>

<head>
    <meta charset='utf-8'>
    <title>Documento sin título</title>
</head>

<body>
    <form method="POST" action="./index.php">
        <table>
            <tr>
                <th colspan="2">CARGAR NUEVA BIBLIOTECA</th>
            </tr>
            <tr>
                <td class="der">CODIGO : &nbsp</td>
                <td><input class="izq" type="text" name="cod" size="30" id="cod"></td>
            <tr>
                <td class="der">NOMBRE : &nbsp</td>
                <td><input class="izq" type="text" name="nom" size="30" id="nom"></td>
            <tr>
                <td class="der">NUMERO : &nbsp</td>
                <td><input class="izq" type="text" name="num" size="30" id="num"></td>
            <tr>
                <td class="der">TELEFONO : &nbsp</td>
                <td><input class="izq" type="text" name="tel" size="30" id="tel"></td>
            <tr>
                <td class="der">LOCALIDAD : &nbsp</td>
                <td><input class="izq" type="text" name="loc" size="30" id="loc"></td>
            <tr>
                <td class="der">PROVINCIA : &nbsp</td>
                <td><input class="izq" type="text" name="pro" size="30" id="pro"></td>
            <tr>
                <td class="der">ORGANIZACION : &nbsp</td>
                <td><input class="izq" type="text" name="org" size="30" id="org"></td>
            <tr>
                <td><input class="cen" type="hidden" name="back" id="back" value="Volver"></td>
                <td><input type="submit" name="create2" value="CARGAR"></td>
            </tr>
        </table>
    </form>
</body>

</html>