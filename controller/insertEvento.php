<?php
    require_once 'connection.php';

    $conn = new mysqli ($db_host, $db_user, $db_password, $db_name);
    $conn->set_charset('utf8');

    if ($conn->connect_error)
    {
        die('La conexion con la base de datos fallo'.$conn->connect_error);
    }

    $subs_nombreEvento = $_POST['nombreEvento'];
    $subs_descripcionEvento = $_POST['descripcionEvento'];
    $subs_tipoAsistente = $_POST['tipoAsistente'];
    $subs_lugarEvento = $_POST['lugarEvento'];
    $subs_fechaEvento = $_POST['fechaEvento'];
    $subs_horaEvento = $_POST['horaEvento'];

    $subs_imagen = $_FILES['imagen']['tmp_name'];
    $subs_peso = $_FILES['imagen']['size'];
    $subs_tipo = $_FILES['imagen']['type'];

    $subs_imagen = mysqli_real_escape_string($conn, file_get_contents($_FILES['imagen']['tmp_name']));

    $sql = 'INSERT INTO Evento (nombreEvento, descripcion, tipoAsistente, lugarEvento, fechaEvento, horaEvento, imagenEvento, tipoImagen, pesoImagen)
            VALUES ("'.$subs_nombreEvento.'","'.$subs_descripcionEvento.'","'.$subs_tipoAsistente.'","'.$subs_lugarEvento.'","'.$subs_fechaEvento.'","'.$subs_horaEvento.'","'.$subs_imagen.'","'.$subs_tipo.'","'.$subs_peso.'")';
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
