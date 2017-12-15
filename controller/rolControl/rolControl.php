<?php
    require_once 'Role.php';
    require_once 'User.php';
    require_once '../connection.php';
    //Rol control
    session_start();
    $conexion = new mysqli($db_host, $db_user, $db_password, $db_name);

    if($conexion->connect_error){
        die('La conexion fallo: '.$conexion->connect_error);
    }


    if(isset($_SESSION['loggedin']))
    {
        $user = new User($_SESSION['user_id'], $conexion);

        echo "salio?";
        
        if($user->hasPermission('UpdateCursos'))
        {
            echo "admin=update";
        }
        else {
            echo "noUpdateCursos";
        }
        if($user->hasPermission('admin'))
        {
            echo "admin=???";
        }
        else {
            echo "noAdmin";
        }
    }
    else {
        header('Location: ../../dashboard/');
    }

    mysqli_close($conexion);

 ?>
