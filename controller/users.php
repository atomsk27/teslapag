<?php
    session_start();
    require_once 'connection.php';

    $conn = new mysqli($db_host, $db_user, $db_password, $db_name);

    if ($conn->connect_error) {
        die('Conexion fallo: '.$conn->connect_error);
    }

    $sql_admin = 'SELECT count(*) num_admin FROM Usuario WHERE idRol = 1';
    $sql_facilitador = 'SELECT count(*) num_fac FROM Usuario WHERE idRol = 2';
    $sql_usuarios = 'SELECT count(*) num_user FROM Usuario WHERE idRol = 3';

    $result_admin = $conn->query($sql_admin);
    $result_facilitador = $conn->query($sql_facilitador);
    $result_usuarios = $conn->query($sql_usuarios);

    $num_admin = $result_admin->fetch_object();
    $num_fac = $result_facilitador->fetch_object();
    $num_user = $result_usuarios->fetch_object();

?>
