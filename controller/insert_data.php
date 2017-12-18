<?php
    require_once 'connection.php';

    $conexion = new mysqli($db_host, $db_user, $db_password, $db_name);

    if($conexion->connect_error){
        die('La conexion fallo: '.$conexion->connect_error);
    }
    $conexion->autocommit(FALSE);

    $user = $_POST['user'];
    $password = $_POST['password'];
    $idRol = $_GET['idRol'];
    $nombrePersona = $_POST['nombrePersona'];
    $apellidoPaterno = $_POST['apellidoPaterno'];
    $apellidoMaterno = $_POST['apellidoMaterno'];
    $dni = $_POST['dni'];
    $email = $_POST['email'];
    $numero = $_POST['numero'];
    $fechaNacimiento = $_POST['fechaNacimiento'];

    $subs_activo = 1;
    function uniqidReal($lenght = 6){
        if (function_exists("random_bytes")) {
            $bytes = random_bytes(ceil($lenght / 2));
        } elseif (function_exists("openssl_random_pseudo_bytes")) {
            $bytes = openssl_random_pseudo_bytes(ceil($lenght / 2));
        } else {
            throw new Exception("no cryptographically secure random function available");
        }
        return substr(bin2hex($bytes), 0, $lenght);
    }
    $subs_aleatorio = uniqidReal();

    $options = array('cost'=>4);
    $hashPassword = password_hash($password, PASSWORD_BCRYPT, $options);

    $sql_usuario = 'INSERT INTO Usuario(user, password, idRol) VALUES ("'.$user.'", "'.$hashPassword.'", "'.$idRol.'")';
    $result_usuario = $conexion->query($sql_usuario);
    if($result_usuario)
    {
        $CONSULTA = 'SELECT idUsuario FROM Usuario WHERE user = "'.$user.'"';
        $RES_CON = $conexion->query($CONSULTA);

        if ($row_u = $RES_CON->fetch_array(MYSQLI_ASSOC)) {

            $sql_persona = 'INSERT INTO Persona(nombrePersona, apellidoPaterno, apellidoMaterno, dni, email, numero, fechaNacimiento, activo, uniqid, idUsuario)
                            VALUES ("'.$nombrePersona.'", "'.$apellidoPaterno.'", "'.$apellidoMaterno.'", "'.$dni.'", "'.$email.'", "'.$numero.'", "'.$fechaNacimiento.'", "'.$subs_activo.'", "'.$subs_aleatorio.'", "'.$row_u['idUsuario'].'")';
        }
        else {
            $conexion->rollback();
        }
        $result_persona = $conexion->query($sql_persona);
        if($result_persona)
        {
            $conexion->commit();
            if ($idRol = 1) {
                header('Location: ../dashboard/admin.php');
            }
            elseif ($idRol = 2) {
                header('Location: ../dashboard/facilitador.php');
            }
            elseif ($idRol = 3) {
                header('Location: ../dashboard/standuser.php');
            }
        }
        else {
            $conexion->rollback();
        }
    }
    else {
        header('Location: ../dashboard/home.php');
    }
    mysqli_close($conexion);
 ?>
