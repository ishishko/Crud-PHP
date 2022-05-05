<!doctype html>
<html>
<head>
<meta charset='utf-8'>
<title>Documento sin título</title>
</head>
<body>
    <?php
        
    try
    {
        

        $conex= new PDO("mysql:host=localhost; dbname=pruebas", "root", ""); //Conexion PDO
        $conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Atributos PDO
        $sql="SELECT * FROM USUARIOS WHERE USUARIO=:logueo AND PASS=:passw"; 
        $resulset=$conex->prepare($sql);
        $login=htmlentities(addslashes($_POST["user"]));
        $pass=htmlentities(addslashes($_POST["contra"]));
        $resulset->bindValue(":logueo", $login);
        $resulset->bindValue(":passw", $pass);
        $resulset->execute();
        $acepto=$resulset->rowCount(); //Cuenta filas afectadas
        
        if ($acepto!=0)
        {
            //echo "<h2>ADELANTE!!</h2>";
            session_start();
            $_SESSION["usuario"]=$_POST["user"];
            header('Location: ./usuarios_registrados1.php');
        }else {
            header('Location: ./login.php');
        }
    }catch(Exception $e)
    {
        die("ERROR" . $e->getMessage());
    }
    
    ?>

</body>
</html>