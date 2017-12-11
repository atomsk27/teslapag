<?php
    require_once 'connection.php';

    $conexion = new mysqli($db_host, $db_user, $db_password, $db_name);

    if($conexion->connect_error){
        die('La conexion fallo: '.$conexion->connect_error);
    }

    //$query = 'SELECT user, password FROM Usuario WHERE user = "'.$username.'"';

    $user = "Admin2";
    $password = 'dmjyr0';
    $idRol = 1;

    $options = array('cost'=>4);
    $hashPassword = password_hash($password, PASSWORD_BCRYPT, $options);

    //$sql = 'INSERT INTO Usuario(user, password, idRol) VALUES ("'.$user.'", "'.$hashPassword.'", "'.$idRol.'")';

    $result = mysqli_query($conexion, $sql);

    if ($result) {
        echo 'Success';
    }
    else {
        echo "R";
    }
    mysqli_close();
 ?>
