<?php
    require_once '../controller/users.php';
    require_once '../controller/vistaCurso.php';
    require_once '../controller/rolControl/Role.php';
    require_once '../controller/rolControl/User.php';

    if (isset($_SESSION['loggedin'] ) && $_SESSION['loggedin'] == true ) {
        $user = new User($_SESSION['user_id'], $conn);
    }
    else {
        header('Location: ../dashboard/');
        exit;
    }

    $now = time();

    if ($now > $_SESSION['expire']) {
        session_destroy();
        header('Location: ../dashboard/');
        exit;
    }
?>
