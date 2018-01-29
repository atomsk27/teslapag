<?php
    require_once 'sessionControl.php';
?>
<!DOCTYPE html>
<html lang="es-ES">
    <head>
        <meta charset="utf-8">
        <title>Cursos - Sesión</title>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link rel="shortcut icon" href="../images/ico/favicon1.png">
    	<link rel="stylesheet" href="./css/main.css">
    </head>
    <body>
        <?php
            require_once 'sidebar.php';
         ?>
         <section class="full-box dashboard-contentPage">
             <nav class="full-box dashboard-Navbar">
     			<ul class="full-box list-unstyled text-right">
     				<li class="pull-left">
     					<a href="#!" class="btn-menu-dashboard"><i class="zmdi zmdi-more-vert"></i></a>
     				</li>
     				<li>
     					<a href="#!" class="btn-Notifications-area">
     						<i class="zmdi zmdi-notifications-none"></i>
     						<span class="badge">7</span>
     					</a>
     				</li>
     				<li>
     					<a href="#!" class="btn-search">
     						<i class="zmdi zmdi-search"></i>
     					</a>
     				</li>
     				<li>
     					<a href="#!" class="btn-modal-help">
     						<i class="zmdi zmdi-help-outline"></i>
     					</a>
     				</li>
     			</ul>
     		</nav>
            <div class="container-fluid">
                <div class="page-header">
                    <h1 class="text-titles">
                        <i class="zmdi zmdi-timer zmdi-hc-fw"></i> CURSO <small>Sesión</small>
                    </h1>
                </div>
                <?php
                if ($_GET['status'] == 'ok') {
                    echo '<p>Se recibio correctamente el archivo</p>';
                } ?>
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                        <h4 class="" style="text-align: center;">
                            <table class="table table-hover text-center">
                                <thead>
                                    <tr>
                                        <th class = "text-center">Curso</th>
                                        <th class = 'text-center'>Fecha</th>
                                        <th class = 'text-center'>Imagen</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        require_once '../controller/vistaSesion.php';

                                        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $row['nombreCurso']; ?>
                                        </td>
                                        <td>
                                            <?php echo $weekday.' '.$day.' of '.$month.', '.$year; ?>
                                        </td>
                                        <td>
                                            <a data-target="#image" data-toggle='modal' class="btn"><i class="zmdi zmdi-collection-image-o"></i></a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </h4>
                    </div>
                </div>
                <div class="container">
                    <div class="row text-center">
                        <div class="col-sm-6">
                            <h2>Galería</h2>
                        </div>
                    </div>
                    <div class="portfolio-items">
                        <?php
                        require_once '../controller/vistaSesion.php';
                        while ($row_sesion = $result_sesion->fetch_array(MYSQLI_ASSOC)) {
                            $sql2 = 'SELECT * FROM Sesion WHERE idInscritoEnCurso = "'.$row_sesion['idInscritoEnCurso'].'"';
                            $result2 = $conn->query($sql2);
                            while ($row2 = $result2->fetch_array(MYSQLI_ASSOC)) {
                                echo $row2['idSesion'];
                                ?>
                                <div class="col-sm-3 col-xs-12 portfolio-item scratch">
                                    <div class="view efffect">
                                        <div class="portfolio-image">
                                            <?php
                                                $img = $row2['idSesion'];
                                                echo  '<img src="../controller/verGaleria.php?id='.$img.' alt="">';
                                            ?>
                                        </div>

                                    </div>
                                </div>
                                <?php
                            }

                            ?>

                        <?php }?>
                    </div>
                </div>
         </section>

         <div class="modal fade" tabindex="-1" role="dialog" id="image">
             <div class="modal-dialog" role="document">
                 <div class="modal-content">
                     <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                         <h4 class="modal-title text-center">Subir Imagen</h4>
                     </div>
                     <div class="modal-body">
                        <form class="" action="../controller/insertImagen.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class ='control-label'> Descripcion de la Imagen</label>
                                <input type="text" name="descripcion" value="descripcion">
                            </div>
                            <div class="form-group">
                              <div>
                                <input type="text" readonly="" class="form-control" placeholder="Buscar Imagen a Subir...">
                                <input type="file" name="foto" value='foto'>
                              </div>
                            </div>

                     </div>
                     <div class="modal-footer">
                         <button type="submit" class="btn btn-primary btn-raised" ><i class="zmdi zmdi-thumb-up"></i> Subir</button>
                     </div>
                        </form>
                 </div>
             </div>
         </div>
         <!-- Notifications area -->
     	<section class="full-box Notifications-area">
     		<div class="full-box Notifications-bg btn-Notifications-area"></div>
     		<div class="full-box Notifications-body">
     			<div class="Notifications-body-title text-titles text-center">
     				Notifications <i class="zmdi zmdi-close btn-Notifications-area"></i>
     			</div>
     			<div class="list-group">
     			  	<div class="list-group-item">
     				    <div class="row-action-primary">
     				      	<i class="zmdi zmdi-alert-triangle"></i>
     				    </div>
     				    <div class="row-content">
     				      	<div class="least-content">17m</div>
     				      	<h4 class="list-group-item-heading">Tile with a label</h4>
     				      	<p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus.</p>
     				    </div>
     			  	</div>
     			  	<div class="list-group-separator"></div>
     			  	<div class="list-group-item">
     				    <div class="row-action-primary">
     				      	<i class="zmdi zmdi-alert-octagon"></i>
     				    </div>
     				    <div class="row-content">
     				      	<div class="least-content">15m</div>
     				      	<h4 class="list-group-item-heading">Tile with a label</h4>
     				      	<p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus.</p>
     				    </div>
     			  	</div>
     			  	<div class="list-group-separator"></div>
     				<div class="list-group-item">
     				    <div class="row-action-primary">
     				      	<i class="zmdi zmdi-help"></i>
     				    </div>
     				    <div class="row-content">
     				      	<div class="least-content">10m</div>
     				      	<h4 class="list-group-item-heading">Tile with a label</h4>
     				      	<p class="list-group-item-text">Maecenas sed diam eget risus varius blandit.</p>
     				    </div>
     				</div>
     			  	<div class="list-group-separator"></div>
     			  	<div class="list-group-item">
     				    <div class="row-action-primary">
     				      	<i class="zmdi zmdi-info"></i>
     				    </div>
     				    <div class="row-content">
     				      	<div class="least-content">8m</div>
     				      	<h4 class="list-group-item-heading">Tile with a label</h4>
     				      	<p class="list-group-item-text">Maecenas sed diam eget risus varius blandit.</p>
     				    </div>
     			  	</div>
     			</div>

     		</div>
     	</section>
        <!-- Dialog help -->
    	<div class="modal fade" tabindex="-1" role="dialog" id="Dialog-Help">
    	  	<div class="modal-dialog" role="document">
    		    <div class="modal-content">
    			    <div class="modal-header">
    			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    			    	<h4 class="modal-title">Help</h4>
    			    </div>
    			    <div class="modal-body">
    			        <p>
    			        	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt beatae esse velit ipsa sunt incidunt aut voluptas, nihil reiciendis maiores eaque hic vitae saepe voluptatibus. Ratione veritatis a unde autem!
    			        </p>
    			    </div>
    		      	<div class="modal-footer">
    		        	<button type="button" class="btn btn-primary btn-raised" data-dismiss="modal"><i class="zmdi zmdi-thumb-up"></i> Ok</button>
    		      	</div>
    		    </div>
    	  	</div>
    	</div>
         <!--====== Scripts -->
     	<script src="./js/jquery-3.1.1.min.js"></script>
     	<script src="./js/sweetalert2.min.js"></script>
     	<script src="./js/bootstrap.min.js"></script>
     	<script src="./js/material.min.js"></script>
     	<script src="./js/ripples.min.js"></script>
     	<script src="./js/jquery.mCustomScrollbar.concat.min.js"></script>
     	<script src="./js/main.js"></script>
     	<script>
     		$.material.init();
     	</script>
    </body>

</html>
