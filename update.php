<!doctype html>
<html>
<head>
<meta charset='utf-8'>
<title>Documento sin título</title>
<style>
    h1,h2,h3{
        text-align: center;
    }
    table{
        width: 30%;
        margin: auto;
        background-color: #ffc;
        border: 2px solid #f00;
        padding: 5px;
    }
    td{
        text-align: center;
    }
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
    <?php

    if(isset($_POST["mod"]))
    {
        include "./conexion.php";
        $id=$_POST["id"];
        $cod=$_POST["cod"];
        $nom=$_POST["nom"];
        $num=$_POST["num"];
        $tel=$_POST["tel"];
        $loc=$_POST["loc"];
        $pro=$_POST["pro"];
        $org=$_POST["org"];

        $sql="UPDATE contactos_celulares_bps_ddjj SET Codigo=:cod, Nombre=:nom, Numero=:num, Telefono=:tel, Localidad=:loc, Provincia=:pro, Organizacion=:org WHERE Id=:id";
        $resulset=$conex->prepare($sql);
        $resulset->execute(array(":id"=>$id, ":cod"=>$cod, ":nom"=>$nom, ":num"=>$num, ":tel"=>$tel, ":loc"=>$loc, ":pro"=>$pro, ":org"=>$org));
        header("location:./form_index.php");


    }


    ?>
<h2>ACTUALIZAR</h2>
<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
<table>
        <tr><td colspan="2"><input class="cen" type="hidden" name="id" id="id" value="<?php echo $_GET['id']?>"></td></tr>
        <tr><td>CODIGO</td><td><input class="cen" type="text" name="cod" id="cod" value="<?php echo $_GET['cod']?>"></td>
        <tr><td>NOMBRE</td><td><input class="cen" type="text" name="nom" id="nom" value="<?php echo $_GET['nom']?>"></td>
        <tr><td>NUMERO</td><td><input class="cen" type="text" name="num" id="num" value="<?php echo $_GET['num']?>"></td>
        <tr><td>TELEFONO</td><td><input class="cen" type="text" name="tel" id="tel" value="<?php echo $_GET['tel']?>"></td>
        <tr><td>LOCALIDAD</td><td><input class="cen" type="text" name="loc" id="loc" value="<?php echo $_GET['loc']?>"></td>
        <tr><td>PROVINCIA</td><td><input class="cen" type="text" name="pro" id="pro" value="<?php echo $_GET['pro']?>"></td>
        <tr><td>ORGANIZACION</td><td><input class="cen" type="text" name="org" id="org" value="<?php echo $_GET['org']?>"></td>
        <tr><td><a href="./form_index.php"><input class="cen" type="button" name="back" id="back" value="Volver"></a></td>
            <td><input class="cen" type="submit" name="mod" id="mod" value="MODIFICAR"></td>
        </tr>
</table>        
</form>
</body>
</html>