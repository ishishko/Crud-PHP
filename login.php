<!doctype html>
<html>
<head>
<meta charset='utf-8'>
<title>Login CRUD</title>
<style>
    h1,h2,h3{
        text-align: center;
    }
    table{
        width: 18pc;
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
    
    if(isset($_COOKIE["usuario"]))                  //Verifica inicio sesion guardada
    {
        session_start();
        $_SESSION["usuario"]=$_COOKIE["usuario"];
        
    }

    session_start();
    if(isset($_SESSION["usuario"]))                 //Verifica Sesion Iniciada
    {
        header("Location: ./form_index.php");
    }

    if(isset($_POST['login'])){
        try                        //TRY LOGIN
        {
            
            $user=htmlentities(addslashes($_POST["user"]));//ELIMINA INYECCION SQL
            $pass=htmlentities(addslashes($_POST["contra"]));

            
            $conex= new PDO("mysql:host=localhost; dbname=pruebas", "root", "");       //Conexion PDO
            $conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);           //Atributos PDO
            $sql="SELECT ID, USUARIO, PASSWORD FROM USUARIOS2 WHERE USUARIO= '$user'"; // Busca USUARIO
            $resulset=$conex->prepare($sql);
            $resulset->execute();
            
            while($array=$resulset->fetch(PDO::FETCH_NUM)) //Crea Array numerico Con datos de Usuario
            {
                if(password_verify($pass, $array[2])){     //Compara contraseña encriptada
                    if(isset($_POST['recordar']))
                    {
                        session_start();
                        $_SESSION["usuario"]=$_POST["user"];                     //Inicia Sesion
                        setcookie("usuario", $array[1],time()+82400);       //Crea Cookie Usuario logueado 1 mes
                        $resulset->closeCursor();
                        header("Location: ./form_index.php");
                    }else{
                        session_start();
                        $_SESSION["usuario"]=$_POST["user"];                     //Inicia Sesion
                        $resulset->closeCursor();
                        header("Location: ./form_index.php");
                    }
                }else{
                    echo "<h3>Usuario o Password Incorrectas</h3>";
                }
            }    
            
        }catch(Exception $e)
        {
            die("ERROR" . $e->getMessage());
        }
    }elseif(isset($_POST['crear']))
    {
        try
        {
            $user=htmlentities(addslashes($_POST['user']));                    //ELIMINA INYECCION SQL
            $pass=htmlentities(addslashes($_POST['contra']));
                        
            $conex=new PDO("mysql:host=localhost; dbname=pruebas", "root", ""); //Conexion PDO
            $conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    //Atributos PDO
            $conex->exec("SET CHARACTER SET utf8");                             //Atributos PDO
            $sql="SELECT USUARIO FROM USUARIOS2 WHERE USUARIO='$user'";         //Busca si el usuario ya existe
            $resulset=$conex->prepare($sql);
            $resulset->execute();

            if($resulset->rowCount()==0)           //Si Select encuentra usuarios No lo crea
            {
                $pass_c=password_hash($pass, PASSWORD_DEFAULT, array("cost"=>11)); //ENCRIPTA PASSWORD
                $sql="INSERT INTO usuarios2 (USUARIO, PASSWORD) VALUES ('$user', '$pass_c')"; //CREA USUARIO
                $resulset=$conex->prepare($sql);
                $resulset->execute();
                $resulset->closeCursor();       //Desconeccion BBDD
                echo '<h3>USUARIO CREADO</h3>';                    //Imprime datos de usuario creado
                echo '<form action="./login.php" method="reset" name="login">';
                echo '<table><tr><td class="cen">Usuario :</td>';
                echo '<td class="izq">' . $user . '</td></tr>';
                echo '<tr><td class="cen">Password :</td>';
                echo '<td class="izq">' . $pass . '</td></tr>';
                echo '<tr><td colspan=2 class="cen"><input type="submit" name="Continuar" value="Continuar"></td></tr></table>';
                echo '</form>';
                exit;
            }else{
                echo "<h3>Ya existe USUARIO<h3>";
            }


        }catch(Exception $e)
        {
            die("ERROR: " . $e->getMessage());
        }
    }
    
    
    if(!isset($_COOKIE['nombreusuario']) || $autenticar==false)
    {
    include("./form_login.php");
    }else{
        echo "Hola  " . $_COOKIE['nombreusuario'];
    }
    
    if(!isset($_COOKIE['nombreusuario']) || $autenticar==false)
    {
        exit;
    }
    ?>
    
    
    
    