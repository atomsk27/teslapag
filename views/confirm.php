<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Confirm</title>
</head>
<body>
    <?php
        include '../controller/connection.php';
        $db_conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);
        if (!$db_conn) {
            die('No se ha podido conectar a la base de datos');
        }
        if(!empty($_GET["id"])) {
            //$resultado = mysqli_query($db_conn, "SELECT * FROM ".$db_table_name." WHERE uniqid = '". $_GET['id']."'");
            $consulta  = mysqli_query($db_conn, "SELECT * FROM ".$db_table_name." ORDER BY idregistro");
                while ($obj = mysqli_fetch_object($consulta)) {
                    echo "\n", $obj->nombres, "\n ", $obj->apellidos, "\n";

                }
            echo $_GET['id'];
        }
        mysqli_close($db_conn);
    ?>
</body>
</html>
