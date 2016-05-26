<?php 
	
	//para iniciar sesión
	session_start();
	//para destruir la sesión
	session_destroy();

	//incluye el archivo conectar
	include('include/conectar.php');

	//creamos un objeto instanciando la clase Conexion
	$bd = new Conexion();

		//validar el envío del formulario
		if (isset($_POST['txtUsuario']) and isset($_POST['txtClave'])) {
			//tomamos los valores
			$usuario = $_POST['txtUsuario'];
			$clave = $_POST['txtClave'];

			//usamos el método login para entrar al sistema
			$bd->login($usuario, $clave);
			$bd->cerrar();

		} else {

			echo '';
		}
	

 ?>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<!-- Título de la página -->
	<title>Ejemplos para proyectos PHP</title>


</head>
<body>
<header>

</header>
<div class="container-fluid">
	<a href="#">
			<center> <img alt="Aqu&iacute; va el logo" src="img/logo.jpg" class="img-responsive" /> </center>
	</a>
</div>
<div class="container">
	<section class="main row">
		<article class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">
			    <label for="usuario" id="panel">INICIO DE SESI&Oacute;N</label>
			  </div>
			  <div class="panel-body">
			    <article id="contactanos">
					<form action="index.php" method="POST" enctype="application/x-www-from-urlencoded">
							<div class="form-group">
								<label for="Nombre">
									Usuario:
								</label>
								<input type="text" class="form-control" id="Usuario" name="txtUsuario" placeholder="Escriba Aqu&iacute; Su Usuario" required />
							</div>
							<div class="form-group">
								<label for="Clave">
									Contrase&ntilde;a:
								</label>
								<input type="password" class="form-control" id="Clave" name="txtClave" placeholder="Escriba Aqu&iacute; Su Contrase&ntilde;a"  required />
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-lg btn-warning" style="background: #F38020;" title="Enviar mensaje" ><span class="glyphicon glyphicon-user"></span> Entrar</button>
							</div>
						</form>
				</article>
			  </div>
			</div>
		</article>
	</section>
</div>
<footer>
	<div class="container-fluid" style="text-align:center;">
		<?php include ('include/pie.html'); ?>
	</div>
</footer>
</body>

</html>