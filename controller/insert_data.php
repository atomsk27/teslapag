<?php
    require_once 'connection.php';

    $conexion = new mysqli($db_host, $db_user, $db_password, $db_name);

    if($conexion->connect_error){
        die('La conexion fallo: '.$conexion->connect_error);
    }
    $conexion->autocommit(FALSE);

    if (isset($_POST['user'])) {
        $user = $_POST['user'];
    }
    else {
        $user = 'NULL';
    }
    $password = $_POST['password'];
    $idRol = $_GET['idRol'];
    if (isset($_POST['nombrePersona'])) {
        $nombrePersona = $_POST['nombrePersona'];
    }
    else {
        $nombrePersona = 'NULL';
    }
    if (isset($_POST['apellidoPaterno'])) {
        $apellidoPaterno = $_POST['apellidoPaterno'];
    }
    else {
        $apellidoPaterno = 'NULL';
    }
    if (isset($_POST['apellidoMaterno'])) {
        $apellidoMaterno = $_POST['apellidoMaterno'];
    }
    else {
        $apellidoMaterno = 'NULL';
    }
    $dni = $_POST['dni'];
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
    }
    else {
        $email = 'NULL';
    }
    if (isset($_POST['numero'])) {
        $numero = $_POST['numero'];
    }
    else {
        $numero = 'NULL';
    }
    if (isset($_POST['numeroOpcional'])) {
        $numeroOpcional = $_POST['numeroOpcional'];
    }
    else {
        $numeroOpcional = 'NULL';
    }
    if (isset($_POST['fechaNacimiento'])) {
        $fechaNacimiento = $_POST['fechaNacimiento'];
    }
    else {
        $fechaNacimiento =  '1000-01-01';
    }
    if (isset($_POST['sexo'])) {
        $sexo = $_POST['sexo'];
    }
    else {
        $sexo = 0;
    }
    if (isset($_POST['direccion'])) {
        $direccion = $_POST['direccion'];
    }
    else {
        $direccion = 'NULL';
    }
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

            $sql_persona = 'INSERT INTO Persona(nombrePersona, apellidoPaterno, apellidoMaterno, dni, email, numero, numeroOpcional, fechaNacimiento,sexo, direccion,  activo, uniqid, idUsuario)
                            VALUES ("'.$nombrePersona.'", "'.$apellidoPaterno.'", "'.$apellidoMaterno.'", "'.$dni.'", "'.$email.'", "'.$numero.'", "'.$numeroOpcional.'", "'.$fechaNacimiento.'", "'.$sexo.'", "'.$direccion.'", "'.$subs_activo.'", "'.$subs_aleatorio.'",
                            "'.$row_u['idUsuario'].'")';
        }
        else {
            $conexion->rollback();
        }
        $result_persona = $conexion->query($sql_persona);
        if($result_persona)
        {
            $conexion->commit();
            header('Location: ../dashboard/admin.php');
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
