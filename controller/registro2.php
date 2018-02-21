<?php
    include 'connection.php';
    /*
    $db_host="localhost";
    $db_user="root";
    $db_password="rootroot";
    $db_name="teslaeducationsteam";
    /**/

    $db_table_name="registro";
    $db_connection = mysqli_connect($db_host, $db_user, $db_password);
    $db_connection->set_charset('utf8');

    if (!$db_connection) {
        die('No se ha podido conectar a la base de datos');
    }

    $subs_name = $_POST['nombres'];
    $subs_last = $_POST['apellidos'];
    $subs_email = $_POST['email'];
    $subs_colegio = $_POST['colegio'];
    $subs_edad = $_POST['edad'];
    $subs_dni = $_POST['dni'];
    $subs_curso = $_POST['Curso'];

    $subs_nomPadre = $_POST['nomPadre'];
    $subs_apePadre = $_POST['ApePadre'];
    $subs_emailPadre = $_POST['emailPadre'];
    $subs_dniPadre = $_POST['dniPadre'];
    $subs_celularPadre = $_POST['celularPadre'];
    $evento = $_POST['evento'];

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

    $resultado = mysqli_query($db_connection, "SELECT * FROM ".$db_table_name." WHERE email = '".$subs_email."'");

    //$number_rows = mysqli_fetch_array( $resultado);
    /*
    if (mysqli_fetch_array( $resultado) > 0)
    {
        //header('Location: ../views/fail.html');

    } else {
    */

    $tipo = $_GET['tipo'];
    if ($tipo == 'estudiante') {
        $subs_tipo = 'estudiante';
        $insert_value = 'INSERT INTO `' . $db_name . '`.`'.$db_table_name.'` (`nombres` , `apellidos` , `email` , `colegio` , `edad` , `dni`, `tipo`, `activo`, `uniqid`, `curso`, `celularPadre`, `nomPadre`, `apePadre`, `emailPadre`, `dniPadre`)
        VALUES ("' . $subs_name . '", "' . $subs_last . '", "' . $subs_email . '", "' . $subs_colegio . '", "' . $subs_edad . '", "' . $subs_dni. '", "' .$subs_tipo . '" , "' . $subs_activo . '" , "' . $subs_aleatorio. '" ,
        "' . $subs_curso. '" , "' . $subs_celularPadre. '" , "' . $subs_nomPadre. '" , "' . $subs_apePadre. '" , "' . $subs_emailPadre. '" , "' . $subs_dniPadre . '")';
    }
    else {
        $subs_tipo = 'docente';
        $insert_value = 'INSERT INTO `' . $db_name . '`.`'.$db_table_name.'` (`nombres` , `apellidos` , `email` , `colegio` , `dni`,`celularPadre`, `tipo`, `activo`, `uniqid`, `curso`)
        VALUES ("' . $subs_name . '", "' . $subs_last . '", "' . $subs_email . '", "' . $subs_colegio . '", "' . $subs_dni . '", "'. $subs_celularPadre . '" ,"' . $subs_tipo . '" , "' . $subs_activo . '" , "' . $subs_aleatorio. '" , "' .$subs_curso . '")';
    }


    mysqli_select_db($db_connection, $db_name);

    $retry_value = mysqli_query($db_connection, $insert_value);

    if (!$retry_value) {
       die('Error: ' . mysqli_error($db_connection));
    }
    //$mensaje = 'Para confirmar tu inscripcion\n\n';
    //$mensaje .= 'Active su inscripcion pulsando en el enlace: http://www.teslaeducationsteam.org/controller/activation.php?id='.$subs_aleatorio.'';
    $mensaje = 'Gracias con inscribirse a nuestros eventos';
    $asunto = 'Confirmación inscripcion TESLA Education';

    //if(mail($subs_email, $asunto, $mensaje)){

    //$cabecera = "From: nobody@localhost";

    if(!mail($subs_email, $asunto, $mensaje)){
        //echo "Se ha enviado un mensaje a tu correo electrónico con el código de activación";
        //header('Location: ../views/success.html');
        header('Location: ../views/confirm.php?id='.$subs_aleatorio.'');

    }
    else {
        echo "Ha ocurrido un error enviando el mensaje";
    }

    //header('Location: ../views/success.html');

    //}
    mysqli_close($db_connection);

?>
