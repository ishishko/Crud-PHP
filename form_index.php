<!doctype html>
<html>
<head>
<meta charset='utf-8'>
<title>CRUD</title>
<style>
        h1,h2,h3{
        text-align: center;
    }
    table{
        width: 80%;
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
            include "./conexion.php";
            $bbdd="contactos_celulares_bps_ddjj";
            /*$querry=$conex->query("SELECT * FROM $bbdd");         //Crea ARRAY de OBJETOS en 2 lineas
            $querryobj=$querry->fetchAll(PDO::FETCH_OBJ);*/
            $querry=$conex->query("SELECT * FROM $bbdd")->fetchAll(PDO::FETCH_OBJ); //Creado en una sola
            echo "BASE CONECTADA";
    
        ?>





    <h1>CRUD</h1>

    <table width="80%" border="1" align="center">
        <tr>
            <td>CODIGO</td>
            <td>NOMBRE</td>
            <td>NUMERO</td>
            <td>TELEFONO</td>
            <td>LOCALIDAD</td>
            <td>PROVINCIA</td>
            <td>ORGANIZACION</td>
            <td><input class="cen" type="submit" name="upd" id="upd" value="MODIFICAR"></td>
            <td><input class="cen" type="submit" name="del" id="del" value="BORRAR"></td>
        </tr>
        <tr>
            <td><input type="text" name="cod"></td>
            <td><input type="text" name="nom"></td>
            <td><input type="text" name="num"></td>
            <td><input type="text" name="tel"></td>
            <td><input type="text" name="loc"></td>
            <td><input type="text" name="pro"></td>
            <td><input type="text" name="org"></td>
            <td><input class="cen" type="submit" name="bus" id="bus" value="BUSCAR"></td>
            <td><input class="cen" type="submit" name="ins" id="ins" value="INSERTAR"></td>

        </tr>
    </table>

</body>
</html>