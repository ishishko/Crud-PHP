<!doctype html>
<html>
<head>
<meta charset='utf-8'>
<title>Documento sin título</title>
</head>
<body>
    
    <table>
        <tr><td>NOMBRE</td></tr>
    <?php
    
    foreach($sqlcontactos as $registro)
    {
        echo "<tr><td>" . $registro['Nombre'] . "</td></tr>";
    }

    ?>

    </table>
</body>
</html>