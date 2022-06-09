<!doctype html>
<html>

<head>
    <meta charset='utf-8'>
    <title>Documento sin título</title>
    <style>
        h1,
        h2,
        h3 {
            text-align: center;

        }

        table {
            width: 95%;
            margin: auto;
            background-color: #0EB4DA;
            padding: 5px;
            border-collapse: collapse;
        }

        th {
            border: 1px solid #384C50;
        }

        .top {
            border: 2px solid black;
        }

        .color {
            color: #384C50;
        }

        .cen {
            text-align: center;
            color: #384C50;
            border: 0px solid #f00;
        }

        .izq {
            text-align: left;
            border: 0px;
        }

        .der {
            text-align: right;
            color: #384C50;
        }
    </style>
</head>

<body>
    <form method="POST" action="./index.php">
        <table class="top">
            <tr>
                <th colspan="7">
                    <h2>Formulario de busqueda<h2>
                </th>
                <td>
                    <h3>Hola <?php echo $_SESSION['login'] ?></h3>
                </td>
            </tr>
            <tr>
                <th width=100><input type="text" size="8" name="num" placeholder="NUMERO"></th>
                <th width=100><input type="text" size="35" name="nom" placeholder="NOMBRE"></th>
                <th width=100><input type="text" size="50" name="org" placeholder="ORGANIZACION"></th>
                <th width=100><input type="text" size="25" name="loc" placeholder="LOCALIDAD"></th>
                <th width=100><input type="text" size="25" name="pro" placeholder="PROVINCIA"></th>
                <th width=100><input type="submit" name="buscar" value="BUSCAR"></a></th>
                <th width=100><input type="submit" name="create" size="10" value="NUEVO"></>
                </th>
                <td class="cen"><a href="./salir.php"><input type="button" name="salir" id="salir" value="Salir"></a></td>
            </tr>

        </table>
    </form>


    <?php
    if (!isset($_POST['buscar']) && !isset($_GET['pagina_actual']) || (isset($_GET['id']))) {
        exit;
    }
    ?>
    <table>
        <tr>
            <th>Se encontraron <?php echo $filas ?> resultados.</th>
            <th>Mostrando pagina <?php echo $pagina_actual ?> de <?php echo $n_paginas ?></th>
        </tr>
        <tr class="cen">
            <td colspan="2">Tamaño de paginacion: <input class="cen" type="num" name="t_pagina" size="1" value="25"> . Seleccionar pagina
                <?php
                for ($i = 1; $i <= $n_paginas; $i++) {
                    echo " <a href='?pagina_actual=" . $i . "'>" . $i . " </a>";
                }
                ?>
            </td>
        </tr>
    </table>
    <form method="POST">
        <table>
            <tr>
                <td><input type="hidden" ID></td>
                <th>CODIGO</th>
                <th>NOMBRE</th>
                <th>NUMERO</th>
                <th>TELEFONO</th>
                <th>LOCALIDAD</th>
                <th>PROVINCIA</th>
                <th width="30%">ORGANIZACION</th>
                <td colspan="2">&nbsp</td>
            </tr>
            <?php
            foreach ($resulset as $contactos) :
            ?>
                <tr>
                    <td width=100><input class="cen" type="hidden" name="id" value="<?php echo $contactos->ID ?>"></td>
                    <td width=100><input class="cen" type="text" name="cod" size="6" value="<?php echo $contactos->Codigo ?>"></td>
                    <td width=100><input class="izq" type="text" name="nom" size="25" value="<?php echo $contactos->Nombre ?>"></td>
                    <td width=100><input class="cen" type="text" name="num" size="8" value="<?php echo $contactos->Numero ?>"></td>
                    <td width=100><input class="izq" type="text" name="tel" size="13" value="<?php echo $contactos->Telefono ?>"></td>
                    <td width=100><input class="izq" type="text" name="loc" size="28" value="<?php echo $contactos->Localidad ?>"></td>
                    <td width=100><input class="izq" type="text" name="pro" size="28" value="<?php echo $contactos->Provincia ?>"></td>
                    <td width=100><input class="izq" type="text" name="org" size="55" value="<?php echo $contactos->Organizacion ?>"></td>
                    <td><a href='./index.php?id=<?php echo $contactos->ID ?> & update=1'> <input type="button" name="update" value="MODIFICAR"></a></td>
                    <td><a href='./index.php?id=<?php echo $contactos->ID ?> & delete=1'> <input type="button" name="delete" value="ELIMINAR"></td>
                </tr>
            <?php
            endforeach;
            ?>
        </table>
    </form>
    <table>
        <tr class="cen">
            <td colspan="2">Tamaño de paginacion: <input class="cen" type="num" name="t_pagina" size="1" value="25"> . Seleccionar pagina
                <?php
                for ($i = 1; $i <= $n_paginas; $i++) {
                    echo " <a href='?pagina_actual=" . $i . "'>" . $i . " </a>";
                }
                ?>
            </td>
        </tr>
    </table>
</body>

</html>