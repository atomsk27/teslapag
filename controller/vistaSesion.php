<?php
    require_once 'connection.php';
    session_start();
    $conn = new mysqli ($db_host, $db_user, $db_password, $db_name);

    if ($conn->connect_error) {
        die('Error de conexion: '.$conn->connect_error);
    }

    $sql = 'SELECT IEC.idUsuario, C.nombreCurso, IEC.idInscritoEnCurso idInscritoEnCurso FROM InscritoEnCurso IEC
            JOIN Usuario U
            ON U.idUsuario = IEC.idUsuario
            JOIN Curso C
            ON C.idCurso = IEC.idCurso
            WHERE IEC.idUsuario = "'.$_SESSION['user_id'].'"';

    $result = $conn->query($sql);
    $result_sesion = $conn->query($sql);
    /*while($fetch = result->fetch_array(MYSQLI_ASSOC))
    {
        if($_SESSION['user_id']==)
    }*/

    $fecha = getdate();
    $weekday= $fecha['weekday'];
    $day    = $fecha['mday'];
    $month  = $fecha['month'];
    $year   = $fecha['year'];


 ?>
