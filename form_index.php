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
        
        if(isset($_POST['ins']))   //Realiza busqueda con cualquier parametro Ingresado
        {
            $id1=htmlentities($_POST['id1']);
            $cod1=htmlentities($_POST['cod1']);
            $nom1=htmlentities($_POST['nom1']);
            $num1=htmlentities($_POST['num1']);
            $tel1=htmlentities($_POST['tel1']);
            $loc1=htmlentities($_POST['loc1']);
            $pro1=htmlentities($_POST['pro1']);
            $org1=htmlentities($_POST['org1']);

            echo '<h3>INSERTAR</h3>';
            echo '<form method="POST" action="./insertar.php">';
            echo '<table>';
            echo '<tr><td>CODIGO</td><td><input class="cen" type="text" name="codi" id="codi" value="'.$cod1.'"></td>';
            echo '<tr><td>NOMBRE</td><td><input class="cen" type="text" name="nomi" id="nomi" value="'.$nom1.'"></td>';
            echo '<tr><td>NUMERO</td><td><input class="cen" type="text" name="numi" id="numi" value="'.$num1.'"></td>';
            echo '<tr><td>TELEFONO</td><td><input class="cen" type="text" name="teli" id="teli" value="'.$tel1.'"></td>';
            echo '<tr><td>LOCALIDAD</td><td><input class="cen" type="text" name="loci" id="loci" value="'.$loc1.'"></td>';
            echo '<tr><td>PROVINCIA</td><td><input class="cen" type="text" name="proi" id="proi" value="'.$pro1.'"></td>';
            echo '<tr><td>ORGANIZACION</td><td><input class="cen" type="text" name="orgi" id="orgi" value="'.$org1.'"></td>';
            echo '<tr><td><a href="./form_index.php"><input class="cen" type="button" name="back" id="back" value="Volver"></a></td>';
            echo '<td><input class="cen" type="submit" name="crear" id="crear" value="CREAR"></td>';
            echo '</tr>';
            exit;
        }
        
    ?>

    <h1>CRUD</h1>                          <!-- CABECERA FORMULARIO -->                    
    <h3>Usuario : <?php echo $_SESSION["usuario"]?> </h3>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
    <table>                                 
        <tr>
            <td><input type="hidden"ID></td>
            <td></td>
            <td>CODIGO</td>
            <td>NOMBRE</td>
            <td>NUMERO</td>
            <td>TELEFONO</td>
            <td>LOCALIDAD</td>
            <td>PROVINCIA</td>
            <td>ORGANIZACION</td>
            <td><input type="submit" name="reset" id="reset" value="Reset"></a></td>
            <td><a href="./salir.php"><input type="button" name="salir" id="salir" value="Salir"></a></td>
        </tr>
        <tr>                            <!-- INPUTS BUSCAR E INSERTAR -->
            <td><input type="hidden" name="id1" ></td>
            <td></td>
            <td><input type="text" name="cod1" ></td>
            <td><input type="text" name="nom1" ></td>
            <td><input type="text" name="num1" ></td>
            <td><input type="text" name="tel1" ></td>
            <td><input type="text" name="loc1" ></td>
            <td><input type="text" name="pro1" ></td>
            <td><input type="text" name="org1" ></td>
            <td><input class="cen" type="submit" name="bus" id="bus" value="BUSCAR"></td>
            <td><input class="cen" type="submit" name="ins" id="ins" value="INSERTAR"></td>
        </tr>
        
        <?php
        
        if(isset($_POST['bus']))   //Realiza busqueda con cualquier parametro Ingresado
        {
            $id1=$_POST['id1'];
            $cod1=$_POST['cod1'];
            $nom1=$_POST['nom1'];
            $num1=$_POST['num1'];
            $tel1=$_POST['tel1'];
            $loc1=$_POST['loc1'];
            $pro1=$_POST['pro1'];
            $org1=$_POST['org1'];
            $contador=1;
            $resulset=$conex->query("SELECT Id, Codigo, Nombre, Numero, Telefono, Localidad, Provincia, Organizacion FROM contactos_celulares_bps_ddjj
            WHERE Codigo LIKE '%$cod1%' AND Nombre LIKE '%$nom1%' AND Numero LIKE '%$num1%' AND Telefono LIKE '%$tel1%' AND Localidad LIKE '%$loc1%'
            AND Provincia LIKE '%$pro1%' AND Organizacion LIKE '%$org1%' ")->fetchAll(PDO::FETCH_OBJ);
            
        }else{
            exit;
        }
        
        foreach($resulset as $contactos):
        ?>
    
        <tr>                                  <!-- IMPRESION RESULTADOS BUSQUEDA -->
            <td><input type="hidden" name="id" value="<?php echo $contactos->Id?>"></td>
            <td><input type="button" name="id" value="<?php echo $contador?>"></td>
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
            $contador++;
            endforeach;
            
        ?>
    </table>
    </form>
</body>
</html>