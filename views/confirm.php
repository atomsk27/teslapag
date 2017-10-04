<!DOCTYPE html>
<html lang='es-ES'>
    <head>
        <meta charset="utf-8">
        <title>CONFIRMAR CONTENIDO</title>
    </head>
    <body>

        <?php
            include 'controller/connection.php';

            $resultado = mysqli_query($db_connection, "SELECT * FROM ".$db_table_name." WHERE uniqid = '". $_GET['id']."'";

            if(mysqli_query($resultado)){
                echo "asd";
            }
            else
                {echo "dqwd";}
         ?>
    </body>
</html>
