<!DOCTYPE html>
<html lang="es-ES">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="../images/ico/favicon1.png">
    <!--Styles-->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/animate.css" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet">
    <link href="../css/responsive.css" rel="stylesheet">
    <title>Confirmar Inscripcion</title>
</head>
<body>
    <header id="navigation">
        <div class="navbar navbar-inverse navbar-fixed-top" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href='../'><h1><img src="../images/Logo_Index.png" alt="logo" width = '180px' height = '90px'></h1></a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="scroll"><a href="../index.html#navigation">HOME</a></li>
                        <li class="scroll"><a href = '../index.html#steam-ed'>STEAM Ed</a></li>
                        <li class="scroll"><a href="../index.html#services">SERVICIOS</a></li>
                        <li class="scroll"><a href="../index.html#our-team">TESLA Ed</a></li>
                        <li class="scroll"><a href="../index.html#portfolio">GALERIA</a></li>
                        <li class="disabled"><a href="../index.html#clients">CLIENTS</a></li>
                        <li class="disabled"><a href="../index.html#about-us">ABOUT US</a></li>
                        <li class="disabled"><a href="../index.html#blog">BLOG</a></li>
                        <li class="disabled"><a href="../index.html#contact">CONTACT</a></li>

                    </ul>
                </div>
            </div>
        </div>
    </header>
    <div class="confirm-home">
        <div class="container">
                <div class="jumbotron">
                    <h2 class='title-one titulo'>
                        Confirmar inscripción
                    </h2>
                    <h3 class = 'DPersonales'>Datos Personales</h3>
            <?php
                include '../controller/connection.php';
                $db_table_name = 'registro';
                $db_conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);
                if (!$db_conn) {
                    die('No se ha podido conectar a la base de datos');
                }
                else{
                if(!empty($_GET["id"])) {
                    $query = "SELECT * FROM " . $db_table_name . " WHERE uniqid = '" . $_GET["id"] . "'";
                    $consulta  = mysqli_query($db_conn, $query);
                        while ($obj = mysqli_fetch_object($consulta)) {
            ?>
                <div class="container">
                    <div class="col-sm-4">
                        <h5>Nombres:
                        <?php echo $obj->nombres;?>
                        </h5>
                    </div>
                    <div class="col-sm-4">
                        <h5>Apellidos:
                        <?php echo $obj->apellidos;?>
                        </h5>
                    </div>
                </div>
            <?php
                        }
                }
                }
                mysqli_close($db_conn);
            ?>
                </div>

        </div>
    </div>

</body>
</html>
