<?php
    session_start();
    require_once 'rolControl/Role.php';
    require_once 'rolControl/User.php';
    require_once 'connection.php';

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

 ?>
