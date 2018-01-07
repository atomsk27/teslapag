<?php
    require_once 'connection.php';

    $conn = new mysqli($db_host, $db_user, $db_password, $db_name);

    if($conn->connect_error){
        die('La conexion fallo: '.$conn->connect_error);
    }

    $sql = 'SELECT nombreCurso, duracion, fechaInicio, fechaFin, lugar, nivel, dia, horaInicio, horaFin, idCurso FROM vistaCursos';

    $result = $conn->query($sql);
    $result2 = $conn->query($sql);
 ?>
