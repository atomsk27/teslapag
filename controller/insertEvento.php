<?php
    require_once 'connection.php';

    $conn = new mysqli ($db_host, $db_user, $db_password, $db_name);

    if ($conn->connect_error)
    {
        die('La conexion con la base de datos fallo'.$conn->connect_error);
    }

    $subs_nombreEvento = utf8_decode($_POST['nombreEvento']);
    $subs_tipoAsistente = utf8_decode($_POST['tipoAsistente']);
    $subs_lugarEvento = utf8_decode($_POST['lugarEvento']);
    $subs_fechaEvento = utf8_decode($_POST['fechaEvento']);
    $subs_horaEvento = utf8_decode($_POST['horaEvento']);

    $sql = 'INSERT INTO Evento (nombreEvento, tipoAsistente, lugarEvento, fechaEvento, horaEvento)
            VALUES ("'.$subs_nombreEvento.'","'.$subs_tipoAsistente.'","'.$subs_lugarEvento.'","'.$subs_fechaEvento.'","'.$subs_horaEvento.'")';
    $result = $conn->query($sql);

    if($result)
    {
        echo "Se Ingresaron los datos correctamente";
        Header('Location: ../dashboard/eventos.php');
    }
    else {
        echo $conn->error;
        Header('Location: ../dashboard/eventos.php?e=error'.$conn->error);
    }
    $conn->close();
 ?>
