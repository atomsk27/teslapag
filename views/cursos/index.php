<?php
    require '../../controller/vistaCurso.php';

 ?>

 <!DOCTYPE html>
 <html lang="es-ES">
     <head>
         <meta charset="utf-8">
         <title>Cursos</title>
         <link rel="stylesheet" href="../../css/bootstrap.min.css">
     	 <link href="../../css/prettyPhoto.css" rel="stylesheet">
     	 <link href="../../css/font-awesome.min.css" rel="stylesheet">
     	 <link href="../../css/animate.css" rel="stylesheet">
     	 <link href="../../css/main.css" rel="stylesheet">
     	 <link href="../../css/responsive.css" rel="stylesheet">
         <link rel="shortcut icon" href="../../images/ico/favicon1.png">
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
    					<a class="navbar-brand" href='#'><h1><img src="../../images/Logo_Index.png" alt="logo" width = '180px' height = '90px'></h1></a>
    				</div>
    				<div class="collapse navbar-collapse">
    					<ul class="nav navbar-nav navbar-right">
    						<li class="scroll"><a href="../../#">HOME</a></li>
    						<li class="scroll"><a href = '../../#steam-ed'>STEAM Ed</a></li>
    						<li class="scroll"><a href="../../#services">SERVICIOS</a></li>
    						<li class="scroll"><a href="../../#our-team">TESLA Ed</a></li>
    						<li class="scroll"><a href="../../#portfolio">GALERIA</a></li>
    						<li class="disabled"><a href="../../#clients">CLIENTS</a></li>
    						<li class="disabled"><a href="../../#about-us">ABOUT US</a></li>
    						<li class="disabled"><a href="../../#blog">BLOG</a></li>
    						<li class="scroll"><a href="../../#contact">CONTACT</a></li>

    					</ul>
    				</div>
    			</div>
    		</div><!--/navbar-->
    	</header> <!--/#navigation-->
        <section id='curso'>
            <div class="container">
                <div class="text-center">
                    <div class="col-sm-8 col-sm-offset-2">
                        <h2 class="title-one">
                            Cursos
                        </h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-sm-offset-0">
                        <h4 class="" style='text-align:center;'>
                            <table class="table table-hover text-center">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">NombreCurso</th>
                                        <th class="text-center">Duracion</th>
                                        <th class="text-center">Fecha Inicio</th>
                                        <th class="text-center">Fecha Fin</th>
                                        <th class="text-center">Lugar</th>
                                        <th class="text-center">Días</th>
                                        <th class="text-center">Horario</th>
                                    </tr>
                                </thead>
                                <?php
                                while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                                    $count++;
                                ?>
                                <tbody>
                                    <tr>
                                        <td>
                                            <?php echo $count; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['nombreCurso']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['duracion']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['fechaInicio']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['fechaFin']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['lugar']; ?>
                                        </td>
                                        <td>
                                            <?php
                                                switch ($row['dia']) {
                                                    case '1,3':
                                                        $dia = 'Lunes y Miercoles';
                                                        break;
                                                    case '2,4':
                                                        $dia = 'Martes y Jueves';
                                                        break;
                                                    case '3':
                                                        $dia = 'Miercoles';
                                                        break;
                                                    case '4':
                                                        $dia = 'Jueves';
                                                        break;
                                                    case '5':
                                                        $dia = 'Viernes';
                                                        break;
                                                    case '6':
                                                        $dia = 'Sábado';
                                                        break;
                                                    case '7':
                                                        $dia = 'Domingo';
                                                        break;
                                                    default:
                                                        $dia = 'NULL';
                                                        break;
                                                }
                                                echo $dia;
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                                echo $row['horaInicio'], ' - ', $row['horaFin'];
                                            ?>
                                        </td>
                                    </tr>
                                </tbody>
                                <?php }  ?>
                            </table>
                        </h4>
                    </div>

                </div>

                <div class="col-sm-4 col-sm-offset-5">
                        <a href="" class="btn btn-default modal-btn" data-toggle="modal" data-target="#registro">Pre Inscripciones</a>
                </div>

            </div>
        </section>
        <?php
            require_once 'modalRegistro.php';
         ?>

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
     </body>
 </html>
