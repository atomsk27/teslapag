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
    <title> Inscripcion Confirmada</title>
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
                    <h3 class = 'DPersonales'>Datos Personales:</h3>
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
                    $obj = mysqli_fetch_object($consulta);
                    if ( $obj->tipo = 'estudiante') {
                        while ($obj) {
            ?>
            <div class="container gene">
                <div class="container informacion">
                    <div class="col-sm-4">
                        <h5><strong>Nombres:</strong>
                            <?php echo $obj->nombres;?>
                        </h5>
                    </div>
                    <div class="col-sm-4">
                        <h5><strong>Apellidos:</strong>
                            <?php echo $obj->apellidos;?>
                        </h5>
                    </div>
                    <div class="col-sm-4">
                        <h5><strong>E-mail:</strong>
                            <?php echo $obj->email;?>
                        </h5>
                    </div>
                </div>
                <div class="container informacion">
                    <div class="col-sm-4">
                        <h5><strong>Colegio:</strong>
                            <?php echo $obj->colegio;?>
                        </h5>
                    </div>
                    <div class="col-sm-4">
                        <h5><strong>Edad:</strong>
                            <?php echo $obj->edad;?>
                        </h5>
                    </div>
                    <div class="col-sm-4">
                        <h5><strong>DNI:</strong>
                            <?php echo $obj->dni;?>
                        </h5>
                    </div>
                </div>
            </div>
            <h3 class='DPersonales'>Datos del Apoderado:</h3>
            <div class="container gene">
                <div class="container informacion">
                    <div class="col-sm-4">
                        <h5><strong>Nombres del Apoderado:</strong>
                            <?php echo $obj->nomPadre;?>
                        </h5>
                    </div>
                    <div class="col-sm-4">
                        <h5><strong>Apellidos del Apoderado:</strong>
                            <?php echo $obj->apePadre;?>
                        </h5>
                    </div>
                    <div class="col-sm-4">
                        <h5><strong>E-mail del Apoderado:</strong>
                            <?php echo $obj->emailPadre;?>
                        </h5>
                    </div>
                </div>
                <div class="container informacion">
                    <div class="col-sm-4">
                        <h5><strong>DNI Apoderado:</strong>
                            <?php echo $obj->dniPadre;?>
                        </h5>
                    </div>
                    <div class="col-sm-4">
                        <h5><strong>Número de Contacto:</strong>
                            <?php echo $obj->celularPadre;?>
                        </h5>
                    </div>
                </div>
                <div class="container">
                    <div class="code">
                        <h3><strong>Código de Inscripcion:</strong>
                            <?php echo $obj->uniqid;?>
                        </h3>
                    </div>

                </div>
            </div>
            <div class="container">
                <div class="col-sm-12">
                    <a href="eventos.html" class="btn btn-default conf-btn">Nueva inscripción</a>
                </div>
            </div>
            <?php
                        }
                }
            else {
                while ($obj) {
            ?>
                <div class="container gene">
                    <div class="container informacion">
                        <div class="col-sm-4">
                            <h5><strong>Nombres:</strong>
                                <?php echo $obj->nombres;?>
                            </h5>
                        </div>
                        <div class="col-sm-4">
                            <h5><strong>Apellidos:</strong>
                                <?php echo $obj->apellidos;?>
                            </h5>
                        </div>
                        <div class="col-sm-4">
                            <h5><strong>E-mail:</strong>
                                <?php echo $obj->email;?>
                            </h5>
                        </div>
                    </div>
                    <div class="container informacion">
                        <div class="col-sm-4">
                            <h5><strong>Colegio:</strong>
                                <?php echo $obj->colegio;?>
                            </h5>
                        </div>
                        <div class="col-sm-4">
                            <h5><strong>DNI:</strong>
                                <?php echo $obj->dni;?>
                            </h5>
                        </div>
                        <div class="col-sm-4">
                            <h5><strong>Número de Contacto:</strong>
                                <?php echo $obj->celularPadre;?>
                            </h5>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="col-sm-12">
                        <a href="eventos.html" class="btn btn-default conf-btn">Nueva inscripción</a>
                    </div>
                </div>
            <?php
                }
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
