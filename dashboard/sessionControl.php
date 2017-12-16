<?php
    session_start();
    require_once '../controller/users.php';

    if (isset($_SESSION['loggedin'] ) && $_SESSION['loggedin'] == true ) {

    }
    else {
        echo "Vista solo para usuarios registrados";
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
