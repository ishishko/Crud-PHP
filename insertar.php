<!doctype html>
<html>
<head>
<meta charset='utf-8'>
<title>Documento sin título</title>
</head>
<body>
    <?php

    include "./conexion.php";
    $cod=htmlentities($_POST['codi']);
    $nom=htmlentities($_POST['nomi']);
    $num=htmlentities($_POST['numi']);
    $tel=htmlentities($_POST['teli']);
    $loc=htmlentities($_POST['loci']);
    $pro=htmlentities($_POST['proi']);
    $org=htmlentities($_POST['orgi']);

    $sql="INSERT INTO contactos_celulares_bps_ddjj (Codigo, Nombre, Numero, Telefono, Localidad, Provincia, Organizacion)
        VALUES ($cod, $nom, $num, $tel, $loc, $pro, $org)";
    $resulset=$conex->prepare($sql);
    $resulset->execute();
    $resulset->closeCursor();
    header("location:form_index.php")
    ?>
</body>
</html>