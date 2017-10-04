<?php
    include 'connection.php';

    $subs_name = $_POST['nombres'];
    $subs_last = utf8_decode($_POST['apellidos']);
    $subs_email = utf8_decode($_POST['email']);
    $subs_colegio = utf8_decode($_POST['colegio']);
    $subs_edad = utf8_decode($_POST['edad']);
    $subs_dni = utf8_decode($_POST['dni']);

    $subs_nomPadre = utf8_decode($_POST['nomPadre']);
    $subs_apePadre = utf8_decode($_POST['ApePadre']);
    $subs_emailPadre = utf8_decode($_POST['emailPadre']);
    $subs_dniPadre = utf8_decode($_POST['dniPadre']);
    $subs_celularPadre = utf8_decode($_POST['celularPadre']);

    $subs_activo = 0;
    $subs_aleatorio = uniqid();

    $resultado = mysqli_query($db_connection, "SELECT * FROM ".$db_table_name." WHERE email = '".$subs_email."'");

    //$number_rows = mysqli_fetch_array( $resultado);
    /*
    if (mysqli_fetch_array( $resultado) > 0)
    {
        //header('Location: ../views/fail.html');

    } else {
    */
    	$insert_value = 'INSERT INTO `' . $db_name . '`.`'.$db_table_name.'` (`nombres` , `apellidos` , `email` , `colegio` , `edad` , `dni` , `nomPadre` , `apePadre` , `emailPadre` , `dniPadre` , `celularPadre`, `activo`, `uniqid`)
        VALUES ("' . $subs_name . '", "' . $subs_last . '", "' . $subs_email . '", "' . $subs_colegio . '", "' . $subs_edad . '", "' . $subs_dni . '", "' . $subs_nomPadre . '"
        , "' . $subs_apePadre . '", "' . $subs_emailPadre . '", "' . $subs_dniPadre . '", "' . $subs_celularPadre . '" , "' . $subs_activo . '" , "' . $subs_aleatorio . '")';

    mysqli_select_db($db_connection, $db_name);

    $retry_value = mysqli_query($db_connection, $insert_value);

    if (!$retry_value) {
       die('Error: ' . mysqli_error($db_connection));
    }
    $mensaje = 'Para confirmar tu inscripcion\n\n';
    $mensaje .= 'Active su inscripcion pulsando en el enlace: http://www.teslaeducationsteam.org/controller/activation.php?id='.$subs_aleatorio.'';

    $asunto = 'Confirmación inscripcion TESLA Education';

    //if(mail($subs_email, $asunto, $mensaje)){

    $cabecera = "From: nobody@localhost";

    if(!mail($subs_email, $asunto, $mensaje, $cabecera)){
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
