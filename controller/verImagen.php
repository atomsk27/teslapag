<?php
    require_once 'connection.php';

    $conn = new mysqli($db_host, $db_user, $db_password, $db_name);

    if ($conn->connect_error) {
        die("Error DataBase:".$conn->connect_error);
    }

    $id = $_GET['id'];

    $sql = 'SELECT * FROM Evento WHERE idEvento = "'.$id.'"';

    $result = $conn->query($sql);
    $row_img = $result->fetch_array(MYSQLI_ASSOC);

    $imagen = $row_img['imagenEvento'];

    Header('Content-type: "'.$row['tipoImagen'].'"');
    Header('Content-lenght: "'.$row['pesoImagen'].'"');

    echo $imagen;
 ?>
