<?php

    /**/
    $db_host="localhost";
    $db_user="root";
    $db_password="rootroot";
    $db_name="teslaeducationsteam";
    /**/

    $db_table_name="registro";
    $db_connection = mysqli_connect($db_host, $db_user, $db_password);

    if (!$db_connection) {
        die('No se ha podido conectar a la base de datos');
    }
 ?>
