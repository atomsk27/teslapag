<?php
	require_once 'sessionControl.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Administración - Eventos</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="shortcut icon" href="../images/ico/favicon1.png">
	<link rel="stylesheet" href="./css/main.css">
	<link rel="stylesheet" href="/css/bootstrap.min.css">
</head>
<body>
	<!-- SideBar -->
	<?php
		require_once 'sidebar.php';
	 ?>
	<!-- Content page-->
	<section class="full-box dashboard-contentPage">
		<!-- NavBar -->
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
		<!-- Content page -->
		<div class="container-fluid">
			<div class="page-header">
			  <h1 class="text-titles"><i class="zmdi zmdi-book zmdi-hc-fw"></i> Administración <small>Eventos</small></h1>
			</div>
		</div>

		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<ul class="nav nav-tabs" style="margin-bottom: 15px;">
						<li class="active"><a href="#list" data-toggle="tab">List</a></li>
						<?php if ($user->hasPermission('UpdateEventos')){ ?>
						<li class=""><a href="#new" data-toggle="tab">New</a></li>
						<?php } ?>

					</ul>
					<div class="tab-pane fade active in" id="list">
				        <div class="table-responsive">
				            <table class="table table-hover text-center">
				                <thead>
				                    <tr>
				                        <th class="text-center">#</th>
				                        <th class="text-center">Nombre Evento</th>
				                        <th class="text-center">Tipo Asistente</th>
				                        <th class="text-center">Lugar</th>
				                        <th class="text-center">Fecha</th>
				                        <th class="text-center">Hora</th>
				                    </tr>
				                </thead>
				                <?php
								/*require_once '../controller/connection.php';
								$conn = new mysqli($db_host, $db_user, $db_password, $db_name);*/
								$sql = 'SELECT * FROM vistaEvento';
								$result = $conn->query($sql);
				                while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
				                    $count++;

				                ?>
				                <tbody>
				                    <tr>
				                        <td>
				                            <?php echo $count; ?>
				                        </td>
				                        <td>
				                            <?php echo $row['nombreEvento']; ?>
				                        </td>
				                        <td>
				                            <?php
												if ($row['tipoAsistente'] == 1)
												 	$asistente = 'Docentes';
												else if ($row['tipoAsistente'] == 2)
													$asistente = 'Estudiantes';
												echo $asistente;
											?>
				                        </td>
				                        <td>
				                            <?php echo $row['lugarEvento']; ?>
				                        </td>
				                        <td>
				                            <?php echo $row['fechaEvento']; ?>
				                        </td>
				                        <td>
				                            <?php echo $row['horaEvento']; ?>
				                        </td>
				                    </tr>
				                </tbody>
				                <?php }  ?>
				            </table>
				            <ul class="pagination pagination-sm">
				                <li class="disabled"><a href="#!">«</a></li>
				                <li class="active"><a href="#!">1</a></li>
				                <li class="disabled"><a href="#!">2</a></li>
				                <li class="disabled"><a href="#!">3</a></li>
				                <li class="disabled"><a href="#!">4</a></li>
				                <li class="disabled"><a href="#!">5</a></li>
				                <li class="disabled"><a href="#!">»</a></li>
				            </ul>
				        </div>
				    </div>
			<div class="tab-pane fade" id="new" style="margin-top: -20%;">
				<!--CORREGIR MARGIN TOP-->
		        <div class="container-fluid">
		            <div class="row">
		                <div class="col-xs-12 col-md-10 col-md-offset-1">
		                    <form action="../controller/insertEvento.php" method="post" enctype="multipart/form-data">
		                        <div class="form-group label-floating">
		                          <label class="control-label">Nombre Evento</label>
		                          <input class="form-control" type="text" name = 'nombreEvento' required>
		                        </div>
								<div class="form-group label-floating">
		                          <label class="control-label">Descripcion</label>
		                          <input class="form-control" type="text" name = 'descripcionEvento' required>
		                        </div>
		                        <div class="form-group label-floating">
		                          <label class="control-label">Tipo de Asistente</label>
								  <select class="form-control" name="tipoAsistente">
									<option value="0"></option>
								  	<option value="1">Docente</option>
									<option value="2">Estudiante</option>
								  </select>
		                        </div>
		                        <div class="form-group label-floating">
		                          <label class="control-label">Lugar Evento</label>
		                          <input class="form-control" type="text" name='lugarEvento' required>
		                        </div>
		                        <div class="form-group">
		                          <label class="control-label">Fecha del Evento</label>
		                          <input class="form-control" type="date" name = 'fechaEvento' required>
		                        </div>
		                        <div class="form-group label-floating">
		                          <label class="control-label">Hora</label>
		                          <input class="form-control" type="text" name="horaEvento" required>
		                        </div>

		                        <div class="form-group">
		                          <label class="control-label">Imagen<small>400px max</small></label>
		                          <div>
		                            <input type="text" readonly="" class="form-control" placeholder="Browse...">
		                            <input type="file" name="imagen" value="imagen">
		                          </div>
		                        </div>

		                        <p class="text-center">
		                            <button href="#!" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i> Save</button>
		                        </p>
		                    </form>
		                </div>
		            </div>
		        </div>
		    </div>

			</div>
		</div>
		</div>
	</section>

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
