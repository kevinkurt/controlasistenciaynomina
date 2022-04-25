<?php
session_start();
$usuario = $_POST['usuario'];
$password = $_POST['password'];

$sql = "SELECT id, usuario, contraseña ,tipo  FROM administrador WHERE usuario = '$usuario'";
$query = $conn->query($sql);
$num = $query ->num_rows;


if($num> 0){ //administrador
    $row = $query-> fetch_assoc();
	$pasword_db = $row['password'];
	$pass_c = sha1($pasword_db);

      if($pasword_db == $pass_c){ //cliente
       $_SESSION['id'] = $row['id']
	   $_SESSION['usuario'] = $row['usuario']
	   $_SESSION['tipo'] = $row['tipo']
}
else{
    <h1 class="bad">ERROR EN LA AUTENTIFICACION</h1>

}
}
?>
<?php include 'includes/header.php'; ?>
<head>
	<style>
		.login-page {
			background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
				url("../images/descarga.jpg");
			background-repeat: repeat;
			background-position: center;
			background-size: cover;		
		}
		.body img{						
		}
		.login-box {			
			font-family: 'Akshar', sans-serif;
    color: white;
		}		
	</style>
</head>

<body class="hold-transition login-page">
	<div class="row">
	<div class="login-box" >
		<div class="login-logo">
			<b>Ingreso Operario</b>
		</div>
		<div class="login-box-body">
			<p class="login-box-msg">Ingresa tu sesión</p>
			<form action=<?php echo $_SERVER ['PHP_SELF()'];?> method="POST">
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
		<div style="padding-top: 100px;padding-left: 90px ">
			<a href="indexAdm.php" class="btn btn-primary btn-sm btn-flat" style="padding-left: 50px;padding-right: 50px;"><i class="fa fa-sign-in"></i> <span>Administrador</span></a>
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
		</div>									
		<?php include 'includes/scripts.php' ?>
</body>

</html>