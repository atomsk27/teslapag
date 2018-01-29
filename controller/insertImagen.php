<?php
    require_once 'vistaSesion.php';

    $row2 = $result->fetch_array(MYSQLI_ASSOC);

    $descripcion = $_POST['descripcion'];
    $foto = $_FILES['foto']['tmp_name'];
    $tipo = $_FILES['foto']['type'];
    $peso = $_FILES['foto']['size'];
    //$foto = mysqli_real_escape_string(file_get_contents($_FILE['foto']['tmp_name']));
    $foto = mysqli_real_escape_string($conn, file_get_contents($_FILES["foto"]["tmp_name"]));
    /*fecha*/
    $now = getdate();
    $day = $now['mday'];
    $month = $now['mon'];
    $year = $now['year'];
    $fecha = $year.'-'.$month.'-'.$day;

    $sql = 'INSERT INTO Sesion (idInscritoEnCurso, descripcion, fecha, tipoImagen, pesoImagen, imagen)
            VALUES ("'.$row2["idInscritoEnCurso"].'" , "'.$descripcion.'" , "'.$fecha.'" , "'.$tipo.'" , "'.$peso.'" , "'.$foto.'")';

    $result = $conn->query($sql);

    if ($result) {
        Header('Location: ../dashboard/sesiones.php?status=ok');
    }
    else {
        echo "Error Subiendo archivos";
    }
    mysqli_close($conn);
 ?>
