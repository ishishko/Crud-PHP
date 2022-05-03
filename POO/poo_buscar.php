    <?php

    require './poo_busqueda.php';
    
    $dato=$_GET['buscar'];
    $buscar =new Busqueda;
    $array_buscar=$buscar->get_buscar($dato);

    ?>

<!doctype html>
<html>
<head>
<meta charset='utf-8'>
<title>Documento sin título</title>
</head>
<body>
    <?php

    foreach($array_buscar as $fila){
        echo $fila['DNI'] . '<br>';
    }

    ?>

</body>
</html>