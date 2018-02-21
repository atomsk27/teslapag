<?php

    include 'connection.php';

    $db_table_name="registro";
    $db_connection = mysqli_connect($db_host, $db_user, $db_password, $db_name);
    $db_connection->set_charset('utf8');

    if (!$db_connection) {
    	die('No se ha podido conectar a la base de datos');
    }


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
