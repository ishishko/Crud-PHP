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
            width: 18pc;
            margin: auto;
            background-color: #0EB4DA;
            border: 0px solid #f00;
            padding: 5px;
        }

        td {
            text-align: center;
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

<body style="background-color:#9EDED8 ;">


    <h1 class="color">LOGIN USUARIOS</h1>
    <form action="./index.php" method="POST">
        <table>
            <tr>
                <td class="der" class="color">Usuario :</td>
                <td><input type="text" name="user"></td>
            </tr>
            <tr>
                <td class="der">Password :</td>
                <td><input type="password" name="contra"></td>
            </tr>
            <tr>
                <td class="cen" colspan="2"><input type="submit" name="crear" value="CREAR"></td>
            </tr>
        </table>
    </form>
</body>

</html>