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
    $autenticar=false;
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
                $autenticar=true;
                if(isset($_POST['recordar']))
                {
                    setcookie('nombreusuario',$_POST['user'], time()+86400);
                }
            }else {
                echo "ERROR: Usuario o Contraseña Incorrecto";
            }
        }catch(Exception $e)
        {
            die("ERROR" . $e->getMessage());
        }
    }
    if(!isset($_COOKIE['nombreusuario']) || $autenticar==false)
    {
    include("formulario.html");
    }else{
        echo "Hola  " . $_COOKIE['nombreusuario'];
    }
    
    if(!isset($_COOKIE['nombreusuario']) || $autenticar==false)
    {
        exit;
    }
    ?>
    
    
    
    <h2>CONTENIDO DE LA WEB</h2>

    <table border="0">
        <Tr><td><img src="./Imagenes/13197046-una-imagen-de-un-paisaje-desértico-bonita.webp" width="130" height="70"></td>
            <td><img src="./Imagenes/descarga.jpg" width="130" height="70"></td></Tr>
        <Tr><td><img src="./Imagenes/hdri-environment-map-round-panorama-260nw-1263266257.webp" width="130" height="70"></td>
        <td><img src="./Imagenes/paisaje-de-la-noche-con-la-vía-láctea-cielo-estrellado-universo-73320642.jpg" width="130" height="70"></td></Tr>
    </table>
    
    <p><a href="cerrar sesion.php">Cerrar Sesion</a></p>
</body>
</html>