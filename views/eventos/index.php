<!DOCTYPE html>
<html lang="es-ES">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Eventos</title>
    <link rel="shortcut icon" href="../../images/ico/favicon1.png">
    <!--Styles-->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link href="../../css/animate.css" rel="stylesheet">
    <link href="../../css/main.css" rel="stylesheet">
    <link href="../../css/responsive.css" rel="stylesheet">
</head>
<body>
    <div class="preloader">
		<div class="preloder-wrap">
			<div class="preloder-inner">
				<div class="ball"></div>
				<div class="ball"></div>
				<div class="ball"></div>
				<div class="ball"></div>
				<div class="ball"></div>
				<div class="ball"></div>
				<div class="ball"></div>
			</div>
		</div>
	</div><!--/.preloader-->

    <header id="navigation">
        <div class="navbar navbar-inverse navbar-fixed-top" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="../../"><h1><img src="../../images/Logo_Index.png" alt="logo" width = '180px' height = '90px'></h1></a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="scroll"><a href="../../">HOME</a></li>
                        <li class="scroll"><a href = '../../#steam-ed'>STEAM Ed</a></li>
                        <li class="scroll"><a href="../../#services">SERVICIOS</a></li>
                        <li class="scroll"><a href="../../#our-team">TESLA Ed</a></li>
                        <li class="scroll"><a href="../../#portfolio">GALERIA</a></li>
                        <li class="disabled"><a href="../../#clients">CLIENTS</a></li>
                        <li class="disabled"><a href="../../#about-us">ABOUT US</a></li>
                        <li class="disabled"><a href="../../#blog">BLOG</a></li>
                        <li class="disabled"><a href="../../#contact">CONTACT</a></li>
                    </ul>
                </div>
            </div>
        </div><!--/navbar-->
    </header> <!--/#navigation-->
    <section id="events">
        <div class="container">
            <div class="text-center">
                <div class="col-sm-12">
                    <h2 class="title-one">Eventos</h2>

                </div>
            </div>

                <div class="row eventos-sec">
                    <div class="col-sm-8" >
                        <?php
                            require_once '../../controller/vistaEvento.php';
                            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                         ?>
                         <div class="eventos-second">

                             <h3>
                                 <?php
                                    $evento = $row['nombreEvento'];
                                    echo $row['nombreEvento'];
                                ?>
                             </h3>
                             <h5>
                                 <?php echo $row['descripcion']; ?>
                             </h5>

                             <h5>Evento dirigido para
                                 <?php
                                 if ($row['tipoAsistente'] == 2) {
                                     $asistente = 'estudiantes';
                                 }
                                 else {$asistente = 'docentes';}
                                echo $asistente;
                                 ?>
                             </h5>
                             <ul>
                               <li>
                                 <h5>
                                     <strong>Lugar: </strong>
                                     <?php echo $row['lugarEvento']; ?>
                                </h5>
                               </li>
                               <li>
                                 <h5>
                                     <strong>Fecha: </strong>
                                     <?php echo $row['fechaEvento']; ?>
                                </h5>
                               </li>
                               <li>
                                 <h5>
                                     <strong>Hora: </strong>
                                     <?php echo $row['horaEvento']; ?>
                                </h5>
                               </li>
                             </ul>
                             <?php
                                echo "<a href='' class='btn btn-default modal-btn' data-toggle='modal' data-target='#registro-eventos-$asistente'>Inscripciones</a>";
                              ?>
                         </div>
                     </div>
                     <div class="col-sm-4">
                         <?php
                            $img = $row['idEvento'];
                            echo '<img src="../../controller/verImagen.php?id='.$img.' alt="" class="img-eventos">';
                          ?>
                     </div>
                         <?php

                            }
                         ?>
                </div>

                <div class="horizontal-line"></div>
                <div class="text-center">
                    <h3 class="title-one evn-past">Eventos Pasados</h3>
                </div>
                <?php
                    require_once '../../controller/vistaEvento.php';
                    while ($row_old = $result_old->fetch_array(MYSQLI_ASSOC)) {
                 ?>
                <div class="row eventos-pri">
                    <div class="col-sm-4">
                        <?php
                           $img = $row_old['idEvento'];
                           echo '<img src="../../controller/verImagen.php?id='.$img.' alt="" class="img-eventos">';
                         ?>
                    </div>
                    <div class="col-sm-8" >
                        <div class="eventos-first">
                            <h3>
                                <?php
                                    echo $row_old['nombreEvento'];
                                ?>
                            </h3>
                            <h5>
                                <?php echo $row_old['descripcion']; ?>
                            </h5>
                        </div>

                    </div>
                </div>
                <?php
                    }
                 ?>
                <div class="row eventos-sec">
                    <div class="col-sm-12">
                        <!--
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem ea tenetur quisquam nesciunt. Tempora porro laudantium, ducimus nulla numquam exercitationem esse ea voluptate ab quo nisi praesentium, mollitia quas cum.</p>
                        -->
                    </div>
                </div>
                <div class="row eventos-sec">
                    <div class="col-sm-12">
                        <!--<a href="" class="btn btn-default modal-btn" data-toggle="modal" data-target="#registro-eventos-docentes">Insc Docentes</a>-->
                    </div>
                </div>
                <!--MODAL EVENTOS-->
                <div class="modal fade" id="registro-eventos-estudiantes" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role='document'>
                        <div class="modal-content">
                            <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h2 class="text-center">Inscripciones</h2>
                            </div>
                            <div class="modal-body">
                                <form action="../../controller/registro.php?tipo=estudiante" method="post" id="form-estudiantes" name="form-estudiantes">
                                    <h3>Datos del participante</h3>
                                    <div class="row">
                                        <div class="form-group col-sm-6">
                                            <label for="nombres">Nombres</label>
                                            <input type="text" class='form-control' id='nombres' placeholder="Nombres" name='nombres' required>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="apellidos">Apellidos</label>
                                            <input type="text" class='form-control' id='apellidos' placeholder="Apellidos" name='apellidos' required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-sm-6">
                                            <label for="email">E-mail</label>
                                            <input type="email" class='form-control' id='email' placeholder="E-Mail" name='email' required>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="colegio">Colegio</label>
                                            <input type="text" class='form-control' id='colegio' placeholder="Colegio" name='colegio'>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-sm-6">
                                            <label for="edad">Edad</label>
                                            <input type="number" class='form-control' id='edad' placeholder="Edad" name='edad'>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="dni">DNI</label>
                                            <input type="number" class='form-control' id='dni' placeholder="DNI" name='dni' maxlength="8" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-sm-6">
                                            <label for="evento">Evento</label>
                                            <?php echo '<input type="text" class="form-control" id="evento" placeholder="evento" name="evento" value="'.$evento.'" readonly="readonly">';?>
                                        </div>
                                    </div>
                                    <h3>Datos del padre o apoderado</h3>
                                    <div class="row">
                                        <div class="form-group col-sm-6">
                                            <label for="nomPadre">Nombres</label>
                                            <input type="text" class='form-control' id='nomPadre' placeholder="Nombres Apoderado" name='nomPadre'>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="ApePadre">Apellidos</label>
                                            <input type="text" class='form-control' id='ApePadre' placeholder="Apellidos Apoderado" name='ApePadre'>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-sm-6">
                                            <label for="emailPadre">E-mail</label>
                                            <input type="email" class='form-control' id='emailPadre' placeholder="E-mail Apoderado" name='emailPadre'>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="dniPadre">DNI</label>
                                            <input type="number" class='form-control' id='dniPadre' placeholder="DNI Apoderado" name='dniPadre' maxlength="8">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-sm-6">
                                            <label for="celularPadre">Celular</label>
                                            <input type="number" class='form-control' id='celularPadre' placeholder="Celular Apoderado" name='celularPadre'>
                                        </div>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <input type="submit" value='Enviar' id='enviar' class='btn-default btn this-btn' >
                                </form>
                            </div>
                                <a class="navbar-brand" href="../../"><h1><img src="../../images/Logo_Index.png" alt="logo" width = '180px' height = '90px'></h1></a>
                        </div>
                    </div>
                </div>
                <!-- END MODAL-->
                <!-- MODAL DOCENTES-->
                <div class="modal fade" id="registro-eventos-docentes" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role='document'>
                        <div class="modal-content">
                            <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h2 class="text-center">Inscripciones Docentes</h2>
                            </div>
                            <div class="modal-body">
                                <form action="../../controller/registro.php?tipo=docente" method="post" id='form-docentes' name="form-docentes">
                                    <input type="hidden" name="curso" value="scratch">
                                    <h3>Datos del participante</h3>
                                    <div class="row">
                                        <div class="form-group col-sm-6">
                                            <label for="nombres">Nombres</label>
                                            <input type="text" class='form-control' id='nombres' placeholder="Nombres" name='nombres' required>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="apellidos">Apellidos</label>
                                            <input type="text" class='form-control' id='apellidos' placeholder="Apellidos" name='apellidos' required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-sm-6">
                                            <label for="email">E-mail</label>
                                            <input type="email" class='form-control' id='email' placeholder="E-Mail" name='email' required>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="colegio">Colegio</label>
                                            <input type="text" class='form-control' id='colegio' placeholder="Colegio" name='colegio'>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-sm-6">
                                            <label for="dni">DNI</label>
                                            <input type="number" class='form-control' id='dni' placeholder="DNI" name='dni' max=99999999 required>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="celularPadre">Celular</label>
                                            <input type="number" class='form-control' id= 'celularPadre' placeholder='Celular' name="celularPadre">
                                        </div>
                                    </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <input type="submit" value='Enviar' id='enviar2' class='btn-default btn this-btn' >
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END MODAL-->
        </div>
    </section>

    <footer id="footer">
        <div class="container">
            <div class="text-center">
                <p>Copyright &copy; 2017 - <a href="https://www.facebook.com/TeslaEducationSTEAM">Tesla Education</a> | All Rights Reserved</p>
            </div>
        </div>
    </footer> <!--/#footer-->

    <script type="text/javascript" src="../../js/jquery.js"></script>
    <script type="text/javascript" src="../../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../js/smoothscroll.js"></script>
    <script type="text/javascript" src="../../js/jquery.isotope.min.js"></script>
    <script type="text/javascript" src="../../js/jquery.prettyPhoto.js"></script>
    <script type="text/javascript" src="../../js/jquery.parallax.js"></script>
    <script type="text/javascript" src="../../js/main.js"></script>
    <script type="text/javascript">
        function validarForm(){
            if (!document.getElementbyId('dni').value.lenght == 8 && !document.getElementbyId('dniPadre').value.lenght == 8) {
                alert('DNI debe contener 8 dígitos');
            }
            else {
                document.getElementbyId('form').submit();
            }
        }
    </script>
    <script type="text/javaScript">
        function pregunta(){
            if (confirm('¿Estas seguro de enviar este formulario?')){
               document.tuformulario.submit()
            }
        }
    </script>
</body>
</html>
