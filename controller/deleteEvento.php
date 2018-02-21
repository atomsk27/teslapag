<?php
    require_once 'connection.php';

    $conn = new mysqli ($db_host, $db_user, $db_password, $db_name);
    $conn->set_charset('utf8');

    if ($conn->connect_error) {
        die('Fallo la conexion: '.$conn->connect_error);
    }
    $conn->autocommit(FALSE);

    $idEvento = $_GET['id'];

    $delete_evento = 'DELETE FROM Evento WHERE idEvento="'.$idEvento.'" LIMIT 1';

    $result = $conn->query($delete_evento);

    if ($result) {
        Header('Location : ../dashboard/evento.php');
        $conn->commit();
        exit;
    }
    else {
        echo "Error Eliminado Evento";
    }
    $conn->close();
 ?>
