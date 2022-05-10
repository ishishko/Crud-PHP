<!doctype html>
<html>
<head>
<meta charset='utf-8'>
<title>Documento sin título</title>
<style>
    h1,h2{
        text-align: center;
    }
    table{
        width: 60%;
        margin: auto;
        background-color: #ffc;
        border: 2px solid #f00;
        padding: 5px;
    }

    td{
        text-align: center;
    }
</style>
</head>
<body>

    <?php

    if(isset($_POST['enviar'])){
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
                
            }else {
                echo "ERROR: Usuario o Contraseña Incorrecto";
            }
        }catch(Exception $e)
        {
            die("ERROR" . $e->getMessage());
        }
    }
    if(!isset($_SESSION['usuario'])){
    include("formulario.html");
    }else{
        echo "Usuario : " . $_SESSION['usuario'];
    }
    ?>
    
    
    <h2>CONTENIDO DE LA WEB</h2>

    <table border="0">
        <Tr><td><img src="./Imagenes/13197046-una-imagen-de-un-paisaje-desértico-bonita.webp" width="130" height="70"></td>
            <td><img src="./Imagenes/descarga.jpg" width="130" height="70"></td></Tr>
        <Tr><td><img src="./Imagenes/hdri-environment-map-round-panorama-260nw-1263266257.webp" width="130" height="70"></td>
        <td><img src="./Imagenes/paisaje-de-la-noche-con-la-vía-láctea-cielo-estrellado-universo-73320642.jpg" width="130" height="70"></td></Tr>
    </table>
    <?php



    ?>

</body>
</html>