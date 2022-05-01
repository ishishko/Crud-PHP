<!doctype html>
<html>
<head>
<meta charset='utf-8'>
<title>Documento sin título</title>
<style>

    h1{
        text-align: center;
        color: #00f;
        border-bottom: double #0000ff;
        width: 20%;
        margin: auto;
    }


    table{
        border: 2px solid #00f;
        padding: 20px 50px;
        margin-top: 50px;
    }

    body{
        background-color: #ffc;
    }

</style>
</head>
<body>
    <h1>ALTA datos</h1>
    <form name="form1" method="get" action="pre_result_insert.php">
        <table border="0" align="center">
            <tr>
                <td>DNI</td>
                <td><label for="dni"></label>
                <input type="text" name="dni" id="dni"></td>
            </tr>

            <tr>
                <td>Nombre</td>
                <td><label for="nombre"></label>
                <input type="text" name="nom" id="nombre"></td>
            </tr>
        
            <tr>
                <td>Apellido</td>
                <td><label for="ape"></label>
                <input type="text" name="ape" id="ape"></td>
            </tr>
            
            <tr>
                <td>Edad</td>
                <td><label for="edad"></label>
                <input type="smallint(4)" name="edad" id="edad"></td>
            </tr>

            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>

            <tr>
                <td align="center"><input type="submit" name="enviar" id="enviar" value="DALE"></td>
                <td align="center"><input type="reset" name="borrar" id="borrar" value="BORRAR"></td>
            </tr>
        </table>
</head>
<body>

</body>
</html>