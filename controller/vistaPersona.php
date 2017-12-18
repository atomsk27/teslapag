<?php
    require_once 'connection.php';

    $conn = new mysqli($db_host, $db_user, $db_password, $db_name);

    if ($conn->connect_error) {
        die('La conexion fallo'.$conn->connect_error);
    }
    $count = 0;
    $sql = 'SELECT * FROM vistaPersona WHERE idRol = "'.$idRol.'"';
    $result = $conn->query($sql);

 ?>
