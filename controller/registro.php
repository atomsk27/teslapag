<?php
    include 'connection.php';
    $db_table_name="registro";
    $db_connection = mysqli_connect($db_host, $db_user, $db_password);

    if (!$db_connection) {
        die('No se ha podido conectar a la base de datos');
    }

    $subs_name = $_POST['nombres'];
    $subs_last = utf8_decode($_POST['apellidos']);
    $subs_email = utf8_decode($_POST['email']);
    $subs_colegio = utf8_decode($_POST['colegio']);
    $subs_edad = $_POST['edad'];
    $subs_dni = utf8_decode($_POST['dni']);

    $subs_nomPadre = utf8_decode($_POST['nomPadre']);
    $subs_apePadre = utf8_decode($_POST['ApePadre']);
    $subs_emailPadre = utf8_decode($_POST['emailPadre']);
    $subs_dniPadre = utf8_decode($_POST['dniPadre']);
    $subs_celularPadre = utf8_decode($_POST['celularPadre']);

    $subs_curso = utf8_decode($_POST['curso']);

    $subs_activo = 0;

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
    function redirect($url)
    {
        if (!headers_sent())
        {
            header('Location: '.$url);
            exit;
            }
        else
            {
            echo '<script type="text/javascript">';
            echo 'window.location.href="'.$url.'";';
            echo '</script>';
            echo '<noscript>';
            echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
            echo '</noscript>'; exit;
        }
    }
    $subs_aleatorio = uniqidReal();

    $resultado = mysqli_query($db_connection, "SELECT * FROM ".$db_table_name." WHERE email = '".$subs_email."'");

    $tipo = $_GET['tipo'];
    if ($tipo == 'estudiante') {
        $subs_tipo = 'estudiante';
        $insert_value = 'INSERT INTO `' . $db_name . '`.`'.$db_table_name.'` (`nombres` , `apellidos` , `email` , `colegio` , `edad` , `dni` , `nomPadre` , `apePadre` , `emailPadre` , `dniPadre` , `celularPadre`, `tipo`, `activo`, `uniqid`, `curso`)
        VALUES ("' . $subs_name . '", "' . $subs_last . '", "' . $subs_email . '", "' . $subs_colegio . '", "' . $subs_edad . '", "' . $subs_dni . '", "' . $subs_nomPadre . '"
        , "' . $subs_apePadre . '", "' . $subs_emailPadre . '", "' . $subs_dniPadre . '", "' . $subs_celularPadre . '" ,"' . $subs_tipo . '" , "' . $subs_activo . '" , "' . $subs_aleatorio . '", "' . $subs_curso . '")';
        mysqli_select_db($db_connection, $db_name);

        $retry_value = mysqli_query($db_connection, $insert_value);

        if (!$retry_value) {
           die('Error: ' . mysqli_error($db_connection));
        }
    }
    elseif ($tipo == 'docente'){
        $subs_tipo = 'docente';
        $insert_value = 'INSERT INTO `' . $db_name . '`.`'.$db_table_name.'` (`nombres` , `apellidos` , `email` , `colegio` , `dni`,`celularPadre`, `tipo`, `activo`, `uniqid`, `curso`)
        VALUES ("' . $subs_name . '", "' . $subs_last . '", "' . $subs_email . '", "' . $subs_colegio . '", "' . $subs_dni . '", "'. $subs_celularPadre . '" ,"' . $subs_tipo . '" , "' . $subs_activo . '" , "' . $subs_aleatorio . '" , "' . $subs_curso . '")';
        mysqli_select_db($db_connection, $db_name);

        $retry_value = mysqli_query($db_connection, $insert_value);

        if (!$retry_value) {
           die('Error: ' . mysqli_error($db_connection));
        }
    }
    else {
      redirect('../');
    }
    $mensaje = 'Para confirmar tu inscripcion\n\n';
    $mensaje .= 'Active su inscripcion pulsando en el enlace: http://www.teslaeducationsteam.org/controller/activation.php?id='.$subs_aleatorio.'';

    $asunto = 'Confirmación inscripcion TESLA Education';

    //if(mail($subs_email, $asunto, $mensaje)){

    //$cabecera = "From: nobody@localhost";

    if(!mail($subs_email, $asunto, $mensaje)){
        //header('Location: ../views/confirm.php?id='.$subs_aleatorio.'');
        redirect('../views/confirm.php?id='.$subs_aleatorio.'');
    }
    else {
        echo "Ha ocurrido un error enviando el mensaje";
    }

    mysqli_close($db_connection);

?>
