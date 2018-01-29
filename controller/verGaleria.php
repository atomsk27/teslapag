<?php
    require_once 'connection.php';

    $conn = new mysqli($db_host, $db_user, $db_password, $db_name);

    if ($conn->connect_error) {
        die("Error DataBase:".$conn->connect_error);
    }

    $id = $_GET['id'];

    $sql = 'SELECT * FROM Sesion WHERE idSesion = "'.$id.'"';

    $result = $conn->query($sql);
    $row = $result->fetch_array(MYSQLI_ASSOC);

    $imagen = $row['imagen'];

    Header('Content-type: "'.$row['tipoImagen'].'"');
    Header('Content-lenght: "'.$row['pesoImagen'].'"');

    echo $imagen;
 ?>
