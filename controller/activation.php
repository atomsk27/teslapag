<?php

    /**/
    $db_host="localhost";
    $db_user="root";
    $db_password="rootroot";
    $db_name="teslaeducationsteam";
    /**/

    $db_table_name="registro";
    $db_connection = mysqli_connect($db_host, $db_user, $db_password, $db_name);

    if (!$db_connection) {
    	die('No se ha podido conectar a la base de datos');
    }

	if(!empty($_GET["id"])) {

	$query = 'UPDATE registro set activo = 1 WHERE uniqid= "' . $_GET["id"]. '"';

	$result = mysqli_query($db_connection, $query);
		if($result) {
			echo "Tu inscripción fue validada satisfactoriamente";

            header('Location: ../views/activacion.html');
		} else {
			echo "Problem in account activation.";
		}
	}
?>
