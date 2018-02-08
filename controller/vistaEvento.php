<?php
    require_once 'connection.php';

    $conn = new mysqli($db_host, $db_user, $db_password, $db_name);

    if ($conn->connect_error) {
        die('Error en la conexion'.$conn->connect_error);
    }

    $sql = 'SELECT * FROM Evento ORDER BY idEvento DESC LIMIT 1';
    $sql_old = 'SELECT * FROM `Evento` ORDER BY idEvento DESC LIMIT 321312312312321 OFFSET 1';

    $result = $conn->query($sql);
    $result_old = $conn->query($sql_old);

 ?>
