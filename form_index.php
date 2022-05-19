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
        width: 90%;
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
        
        session_start();                    //Verifica sesion
        if(isset($_SESSION["usuario"])){
    
            include "./conexion.php";       //incluye conexion de BBDD
        }else{
            echo "<h2>Debe Iniciar Sesion<h2><br>";//redirige a pagina de login
            echo '<a href="./login.php"><input type="button" name="continuar" id="continuar" value="CONTINUAR"></a>';
            exit;
        }                                           //consulta que muestra toda la base
        
    ?>

    <h1>CRUD</h1>                                   
    <h3>Usuario : <?php echo $_SESSION["usuario"]?> </h3>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
    <table>                                 
        <tr>
            <td><input type="hidden"ID></td>
            <td>CODIGO</td>
            <td>NOMBRE</td>
            <td>NUMERO</td>
            <td>TELEFONO</td>
            <td>LOCALIDAD</td>
            <td>PROVINCIA</td>
            <td>ORGANIZACION</td>
            <td colspan="2"><a href="./salir.php"><input type="button" name="salir" id="salir" value="Salir"></a></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="text" name="cod1" ></td>
            <td><input type="text" name="nom1" ></td>
            <td><input type="text" name="num1" ></td>
            <td><input type="text" name="tel1" ></td>
            <td><input type="text" name="loc1" ></td>
            <td><input type="text" name="pro1" ></td>
            <td><input type="text" name="org1" ></td>
            <td><input class="cen" type="submit" name="bus" id="bus" value="BUSCAR"></td>
            <td><input class="cen" type="button" name="ins" id="ins" value="INSERTAR"></td>
        </tr>
    </form>
        <?php
        
        if(!isset($_POST['bus']))
        {
            exit;
        }
        $resulset=$conex->query('SELECT Id, Codigo, Nombre, Numero, Telefono, Localidad, Provincia, Organizacion FROM contactos_celulares_bps_ddjj ')->fetchAll(PDO::FETCH_OBJ);
        foreach($resulset as $contactos):
        ?>
    
        <tr>
            <td><input type="hidden" name="id" value="<?php echo $contactos->Id?>"></td>
            <td><input type="text" name="codigo" value="<?php echo $contactos->Codigo?>"></td>
            <td><input type="text" name="nombre" value="<?php echo $contactos->Nombre?>"></td>
            <td><input type="text" name="nummero" value="<?php echo $contactos->Numero?>"></td>
            <td><input type="text" name="telefono" value="<?php echo $contactos->Telefono?>"></td>
            <td><input type="text" name="localidad" value="<?php echo $contactos->Localidad?>"></td>
            <td><input type="text" name="provincia" value="<?php echo $contactos->Provincia?>"></td>
            <td><input type="text" name="organizacion" value="<?php echo $contactos->Organizacion?>"></td>
            <td><a href="./update.php?id=<?php echo $contactos->Id?> & cod=<?php echo $contactos->Codigo?> & nom=<?php echo $contactos->Nombre?> & num=<?php echo $contactos->Numero?> & tel=<?php echo $contactos->Telefono?> & loc=<?php echo $contactos->Localidad?> & pro=<?php echo $contactos->Provincia?> & org=<?php echo $contactos->Organizacion?>"><input class="cen" type="button" name="upd" id="upd" value="MODIFICAR"></a></td>
            <td><a href="./delete.php?id=<?php echo $contactos->Id?> & cod=<?php echo $contactos->Codigo?> & nom=<?php echo $contactos->Nombre?> & num=<?php echo $contactos->Numero?> & tel=<?php echo $contactos->Telefono?> & loc=<?php echo $contactos->Localidad?> & pro=<?php echo $contactos->Provincia?> & org=<?php echo $contactos->Organizacion?>"><input class="cen" type="button" name="del" id="del" value="BORRAR"></a></td>
        </tr>
        <?php
            endforeach;
        ?>
    </table>
    
</body>
</html>