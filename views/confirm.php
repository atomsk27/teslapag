<!DOCTYPE html>
<html lang="es-ES">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="../images/ico/favicon1.png">
    <!--Styles-->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/animate.css" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet">
    <link href="../css/responsive.css" rel="stylesheet">
    <title>Confirm</title>
</head>
<body>
    <?php
        include_once 'templates/header.php';
        include '../controller/connection.php';

        $db_table_name = 'registro';
        $db_conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);
        if (!$db_conn) {
            die('No se ha podido conectar a la base de datos');
        }
        else{
        if(!empty($_GET["id"])) {
            $query = "SELECT * FROM " . $db_table_name . " WHERE uniqid = '" . $_GET["id"] . "'";
            $consulta  = mysqli_query($db_conn, $query);
                while ($obj = mysqli_fetch_object($consulta)) {
                    echo $obj->nombres, "<br>", $obj->apellidos;
                }
            //echo $_GET['id'];
        }

        }
        mysqli_close($db_conn);
    ?>
</body>
</html>
