<?php
   $usuario = $_POST['usuario'];
   $password = $_POST['password'];
  session_start();
  include 'includes/conn.php';
  $_SESSION['usuario'] = $usuario;
  $sql = "SELECT * FROM administrador WHERE usuario = '$usuario'";
  $query = $conn->query($sql);
  $fila = mysqli_fetch_array($query);
  if($fila['id_empleado']==11){
	header('location: vistaoperario.php');
}else if ($fila['id_empleado']==33){
	header('location: vistaoperario.php');
}else{
	 $_SESSION['error'] = 'Input admin credentials first';
}
?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition login-page">
<div class="row">
    <div class="col-xs-4">
     <button type="submit" class="btn btn-primary btn-block btn-flat" name="login"><i class="fa fa-sign-in"></i> Administrador</button>
    </div>
</div>
<div class="login-box">
  	<div class="login-logo"> 
  		<b>Ingreso Usuarios</b>
  	</div>
  
  	<div class="login-box-body">
    	<p class="login-box-msg">Ingresa tu sesión</p>

    	<form method="POST">
      		<div class="form-group has-feedback">
        		<input type="text" class="form-control" name="usuario" placeholder="ingresar usuario" required autofocus>
        		<span class="glyphicon glyphicon-user form-control-feedback"></span>
      		</div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" placeholder="ingresar contraseña" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
      		<div class="row">
    			<div class="col-xs-4">
          			<button type="submit" class="btn btn-primary btn-block btn-flat" name="login 
					  copy"><i class="fa fa-sign-in"></i> Ingresar</button>
        		</div>
      		</div>
    	</form>
  	</div>
  	<?php
  		if(isset($_SESSION['error'])){
  			echo "
  				<div class='callout callout-danger text-center mt20'>
			  		<p>".$_SESSION['error']."</p> 
			  	</div>
  			";
  			unset($_SESSION['error']);
  		}
  	?>
</div>
	
<?php include 'includes/scripts.php' ?>
</body>
</html>