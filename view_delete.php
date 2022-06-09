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
                <td colspan="2"><input class="cen" type="hidden" name="id" id="id" value="<?php echo $contactos->ID ?>"></td>
            </tr>
            <tr>
                <th colspan="3">ELIMINAR USUARIO</th>
            </tr>
            <tr>
                <td class="der">CODIGO : &nbsp</td>
                <td><input class="izq" type="text" name="cod" size="30" id="cod" value="<?php echo $contactos->Codigo ?>"></td>
            <tr>
                <td class="der">NOMBRE : &nbsp</td>
                <td><input class="izq" type="text" name="nom" size="30" id="nom" value="<?php echo $contactos->Nombre ?>"></td>
            <tr>
                <td class="der">NUMERO : &nbsp</td>
                <td><input class="izq" type="text" name="num" size="30" id="num" value="<?php echo $contactos->Numero ?>"></td>
            <tr>
                <td class="der">TELEFONO : &nbsp</td>
                <td><input class="izq" type="text" name="tel" size="30" id="tel" value="<?php echo $contactos->Telefono ?>"></td>
            <tr>
                <td class="der">LOCALIDAD : &nbsp</td>
                <td><input class="izq" type="text" name="loc" size="30" id="loc" value="<?php echo $contactos->Localidad ?>"></td>
            <tr>
                <td class="der">PROVINCIA : &nbsp</td>
                <td><input class="izq" type="text" name="pro" size="30" id="pro" value="<?php echo $contactos->Provincia ?>"></td>
            <tr>
                <td class="der">ORGANIZACION : &nbsp</td>
                <td><input class="izq" type="text" name="org" size="30" id="org" value="<?php echo $contactos->Organizacion ?>"></td>
            <tr>
                <td></td>
                <td><input class="cen" type="submit" name="back" id="back" value="CANCELAR"></td>
                <td><input type="submit" name="delete2" value="ELIMINAR"></td>
            </tr>
        </table>
    </form>
</body>

</html>