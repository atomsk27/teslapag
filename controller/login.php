<?php
    session_start();
    require_once 'connection.php';
    require_once 'rolControl/Role.php';
    require_once 'rolControl/User.php';

    //SESSION CONTROL
    $conexion = new mysqli($db_host, $db_user, $db_password, $db_name);

    if($conexion->connect_error){
        die('La conexion fallo: '.$conexion->connect_error);
    }

    $username = $_POST['UserEmail'];
    $password = $_POST['UserPass'];

    $query = 'SELECT user, password FROM Usuario WHERE user = "'.$username.'"';

    $result = $conexion->query($query);

    if($result->num_rows > 0)
    {}
        $row = $result->fetch_array(MYSQLI_ASSOC);

        //corregir mysql a password_hash

        if(password_verify($password, $row['password'])){
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['start'] = time();
            $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);

            echo 'Bienvenido' . $_SESSION['username'];
            header('Location: ../dashboard/home.html');

        }
        else {
            echo 'Username o pass incorrectos';
            header('Location: ../dashboard/');
        }


    mysqli_close($conexion);


    //Rol control
    /*
    if(isset($_SESSION['UserEmail']))
    {
        $user = new User($_SESSION['user_id']);

        if($user->hasPermission('permission'))//tipo de permiso?
        {
            //acciones posibles
        }

        if($user->hasPermission('no_permission'))
        {
            //acciones que no puede hacer
        }
    }
*/
 ?>
