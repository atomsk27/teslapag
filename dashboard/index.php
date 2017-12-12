<?php
	session_start() ;
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<title>LogIn</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	
	<link rel="stylesheet" href="./css/main.css">

</head>
<body class="cover">

	<form action="../controller/login.php" method="post" autocomplete="off" class="full-box logInForm">
		<!--

			<img src="../images/Logo_Index.png" alt="TESLA" class='logo'>
		-->

		<p class="text-center text-muted"><i class="zmdi zmdi-account-circle zmdi-hc-5x"></i></p>
		<p class="text-center text-muted text-uppercase">Inicia sesión con tu cuenta</p>

		<?php
			if(isset($_SESSION['failure']))
				{
		?>

		<div class="failure">
			<?php echo $_SESSION['failure'];?>
		</div>
		<?php
			unset($_SESSION['failure']);
			}
		?>

		<div class="form-group label-floating">
		  <label class="control-label" for="UserEmail" >Usuario</label>
		  <input class="form-control" id="UserEmail" type="text"  name='UserEmail' required>
		  <p class="help-block">Escribe tu Usuario</p>
		</div>
		<div class="form-group label-floating">
		  <label class="control-label" for="UserPass" >Contraseña</label>
		  <input class="form-control" id="UserPass" type="password"  name='UserPass' required>
		  <p class="help-block">Escribe tu contraseña</p>
		</div>

		<div class="form-group text-center">
			<input type="submit" value="Iniciar sesión" class="btn btn-raised btn-default">
		</div>
	</form>

	<!--====== Scripts -->
	<script src="./js/jquery-3.1.1.min.js"></script>
	<script src="./js/bootstrap.min.js"></script>
	<script src="./js/material.min.js"></script>
	<script src="./js/ripples.min.js"></script>
	<script src="./js/sweetalert2.min.js"></script>
	<script src="./js/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="./js/main.js"></script>
	<script>
		$.material.init();
	</script>
</body>
</html>