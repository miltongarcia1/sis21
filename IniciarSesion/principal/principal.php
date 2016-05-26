<?php 
	
	//para iniciar sesión
	session_start();

	//para controlar el inico de sesión
	if($_SESSION['validacion'] != 1){
		header("Location: ../index.php");
	}

	//podemos validar el menú para cada tipo de usuario pero en mi caso solo condicionaré el valor de una variable, tomando el tipo de datos de la variable de sesión: USTEDES LO PUEDEN MODIFICAR INCLUYENDO SU MENÚ DEPENDIENDO DEL TIPO DE USUARIO
	if ($_SESSION['tipoUsuario'] == 1) {
		# es admin
		$tipoUsuario = "Administrador";
	} else {
		# es mortal
		$tipoUsuario = "Mortal";
	}
	
	
 ?>
<html lang="es">
<head>
	<?php include("../include/metas_links.html"); ?>
</head>
<body>
<header>

</header>
<div class="container-fluid">
	<a href="#">
			<center> <img alt="Aqu&iacute; va el logo" src="../img/logo.jpg" class="img-responsive" /> </center>
	</a>
</div>
<div class="container">
	<section class="main row">
		<article class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">
			    <label for="usuario" id="panel">SI VEZ ESTO... YA ESTAS DENTRO</label>
			  </div>
			  <div class="panel-body">
			    <article id="contactanos">
					<form action="index.php" method="POST" enctype="application/x-www-from-urlencoded">
							<div class="form-group">
								<h2>
									Te damos la bienvenida tu perfil de usuario es <strong> <?php echo $tipoUsuario; ?> </strong>
								</h2>
							</div>
							<div class="form-group">
								<a href="../index.php" class="btn btn-lg btn-danger"><span class="glyphicon glyphicon-circle-arrow-left"></span> Cerrar Sesi&oacute;n</a>
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
		<?php include ('../include/pie.html'); ?>
	</div>
</footer>
</body>

</html>