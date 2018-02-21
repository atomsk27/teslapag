<?php
    require_once 'connection.php';

    $conn = new mysqli($db_host, $db_user, $db_password, $db_name);
    $conn->set_charset('utf8');

    if($conn->connect_error){
        die('La conexion fallo: '.$conn->connect_error);
    }

    $sql = 'SELECT nombreCurso, duracion, fechaInicio, fechaFin, lugar, nivel, dia, horaInicio, horaFin, idCurso FROM vistaCursos ORDER BY nombreCurso';
    $cursos_count = 'SELECT count(*) num_cursos FROM vistaCursos';
    $evento_count = 'SELECT count(*) num_evento FROM vistaEvento';

    $result = $conn->query($sql);
    $result2 = $conn->query($sql);

    $count_cursos = $conn->query($cursos_count);
    $count_evento = $conn->query($evento_count);

    $num_cursos = $count_cursos->fetch_object();
    $num_evento = $count_evento->fetch_object();
 ?>
