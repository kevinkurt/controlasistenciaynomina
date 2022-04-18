<?php
session_start();
if (isset($_SESSION['Cliente_Admin1'])) {
	header('location:vistaAdministrador.php');
}
?>
<?php include 'includes/header.php'; ?>

<head>


	<style>
		.login-page {


			background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.7)),
				url("../images/descarga.jpg");
			background-repeat: no-repeat;
			background-position: center;
			background-size: cover;


		}

		.login-box {


			font-family: 'Akshar', sans-serif;
			color: white;
		}
	</style>

</head>


<body class="hold-transition login-page">

	<div class="login-box">
		<div class="login-logo">
			<b>Ingreso Administrador</b>
		</div>
		<div class="login-box-body">
			<p class="login-box-msg">Ingresa tu sesión</p>
			<form action="login copy.php" method="POST">
				<div class="form-group has-feedback">
					<input type="text" class="form-control" name="usuario" placeholder="ingresar usuario" required autofocus>
					<span class="glyphicon glyphicon-user form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
					<input type="password" class="form-control" name="password" placeholder="ingresar contraseña" required>
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				</div>
				<div class="row">
					<div class="col-xs-4; padding-left: 100px">
						<button type="submit" class="btn btn-primary btn-block btn-flat" name="login"><i class="fa fa-sign-in"></i> Ingresar</button>
					</div>
				</div>
			</form>
		</div>


		<div style="padding-top: 100px;padding-left: 100px ">
			<a href="index.php" class="btn btn-primary btn-sm btn-flat" style="padding-left: 50px;padding-right: 50px;"><i class="fa fa-sign-in"></i> <span>Operador</span></a>

		</div>
		<?php
		if (isset($_SESSION['error'])) {
			echo "
  				<div class='callout callout-danger text-center mt20'>
			  		<p>" . $_SESSION['error'] . "</p> 
			  	</div>
  			";
			unset($_SESSION['error']);
		}
		?>
	</div>

	<?php include 'includes/scripts.php' ?>
</body>

</html>