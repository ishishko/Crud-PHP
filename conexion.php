    <?php

    try
    {
        $conex=new PDO("mysql:host=localhost; dbname=pruebas", "root", ""); //Conexion PDO
        $conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    //Atributos PDO
        $conex->exec("SET CHARACTER SET utf8");                             //Atributos PDO
        
    }catch(Exception $e){
        die("ERROR :" . $e->getMessage() . "<br>" . "Linea :" . $e->getLine());                                  //ERROR
    }

    ?>