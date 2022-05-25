<!doctype html>
<html>
<head>
<meta charset='utf-8'>
<title>Documento sin título</title>
</head>
<body>
<?php



    try                                                   //PAGINACION DE consultas
    {
        $conex=new PDO("mysql:host=localhost; dbname=pruebas", "root", ""); //Conexion Con BBDD
        $conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    //Atributos de conexion
        $conex->exec("SET CHARACTER SET utf8");                             //Configuracion Caracteres
        $f_pagina=20;                                                       //Filas por pagina
        if(isset($_GET["pagina"]))
        {
            if($_GET["pagina"]==1)
            {
                header("Location:1conex.php");
            }else{
                $pagina=$_GET["pagina"];
            }
        }else{
            $pagina=1;                                                          //
        }
        $desde_pag=($pagina-1)*$f_pagina;                                   //Variable De comienzo de pagina
                                                    //Consulta inicial
        $sql="SELECT * FROM contactos_celulares_bps_ddjj WHERE Provincia='salta'";
        $resulset=$conex->prepare($sql);
        $resulset->execute(array());            
        $rowc=$resulset->rowCount();                                        //Contamos filas de query
        $t_pag=ceil($rowc/$f_pagina);                                       //Total de paginas
        echo "Numero de Registros de Consulta = " . $rowc . "<br>";         
        echo "Mostramos " . $f_pagina . " registros por pagina <br>";
        echo "Mostrando " . $pagina . " de " . $t_pag . "<br>";

        
        $resulset->closeCursor();
                                                    //Consulta con limite
        $sql_limit="SELECT * FROM contactos_celulares_bps_ddjj WHERE Provincia='salta' LIMIT $desde_pag, $f_pagina";
        $resulset_l=$conex->prepare($sql_limit);
        $resulset_l->execute(array());

        while($registro=$resulset_l->fetch(PDO::FETCH_ASSOC))
        {
            echo "Codigo:" . $registro['Codigo'] . " || Nombre: " . $registro['Nombre'] . " || Telefono: " . $registro['Telefono'] . "<br>";
        
        }
        
    }catch(Exception $e)
    {
        die("ERROR:" . $e->getMessage());
    }

    for($i=1; $i<=$t_pag; $i++)
    {
        echo " | <a href='?pagina=" . $i . "'> " . $i . "</a>";
    }


?>
</body>
</html>
