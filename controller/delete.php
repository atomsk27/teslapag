<?php
    require_once 'connection.php';

    $conn = new mysqli ($db_host, $db_user, $db_password, $db_name);

    if ($conn->connect_error) {
        die('Fallo la conexion: '.$conn->connect_error);
    }
    $conn->autocommit(FALSE);

    $idUsuario = $_GET['id'];

    $delete_user = 'DELETE FROM registro WHERE uniqid="'.$idUsuario.'" LIMIT 1';

    $result = $conn->query($delete_user);

    if ($result) {
        Header('Location : ../dashboard/admin.php');
        $conn->commit();
    }
    else {
        echo "Error Eliminado Usuario";
    }
    $conn->close();
 ?>
