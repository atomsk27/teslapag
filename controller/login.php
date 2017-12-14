<?php
    session_start();
    require_once 'connection.php';


    //SESSION CONTROL
    $conexion = new mysqli($db_host, $db_user, $db_password, $db_name);

    if($conexion->connect_error){
        die('La conexion fallo: '.$conexion->connect_error);
    }

    $username = $_POST['UserEmail'];
    $password = $_POST['UserPass'];

    $query = 'SELECT idUsuario user_id, usr user, psw password FROM vistaUsuario WHERE usr = "'.$username.'"';

    $result = $conexion->query($query);

    if($result->num_rows > 0)
    {}
        $row = $result->fetch_array(MYSQLI_ASSOC);

        //corregir mysql a password_hash

        if(password_verify($password, $row['password'])){
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['start'] = time();
            $_SESSION['expire'] = $_SESSION['start'] + (30 * 60);

            $_SESSION['success'] =  "Correct";

            echo 'Bienvenido' . $_SESSION['username'];
            header('Location: ../dashboard/home.php');

        }
        else {
            $_SESSION['failure'] =  "Usuario o contraseña incorrectos";
            echo 'Username o pass incorrectos';
            header('Location: ../dashboard/');
        }


    mysqli_close($conexion);

 ?>
