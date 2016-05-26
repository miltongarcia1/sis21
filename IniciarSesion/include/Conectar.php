<?php
//para los caracteres especiales del idioma
@header("Content-Type: text/html;charset=iso-8859-1");
	/*
	* para conectar
	*/
	class Conexion extends mysqli
	{

		public function __construct()
		{
			parent::__construct('localhost','root','','rentadeautos');
			$this->query("SET NAMES 'utf-8';");
			$this->connect_errno ? die("Error con la conexión") : $x = 'Conectado';
			//echo $x;
			unset($x);
		}

		//Para cerrar la sesión
		public function cerrar(){
			$this->Conexion->close();
		}

		//recorre las filas que retorna una consulta
		public function recorrer($y){

			return mysqli_fetch_array($y);

		}

		//numero de filas de la consulta
		public function rows($y){

			return mysqli_num_rows($y);

		}

		//para entrar al sistema
		public function login($usuario, $pass){

		//asignar datos a los atributos
		$this->user = $usuario;
		$this->password = $pass;

		//definir la consulta: ESTA SE MODIFICARÁ SEGÚN LAS NECESIDADES DE CADA PROYECTO
		$query = "select usuario, clave, CONCAT(nombre,' ',apellido) as nombre, tipoUsuario FROM empleados WHERE usuario = '".$this->user."' and clave = '".$this->password."'";
		
		//Ejecutamos la consulta
		$consulta = $this->query($query);

		//recorre todas las filas y las guarda en un array
		$row = mysqli_fetch_array($consulta);

		//verificamos si los datos enviados y lso de la BD son iguales
		if($this->user == $row['usuario'] and $this->password == $row['clave']){ //compara los datos para el acceso

			session_start(); //inicia la variable de sesión

			//para darle la bienvenida por nombre
			$nombre = $row['nombre'];

			//para guardar el tipo de usuario
			$_SESSION['tipoUsuario'] = $row['tipoUsuario'];

			$_SESSION['validacion'] = 1 ; //si está en 1 hay sesión activa
		
			//se da el acceso: se debe modificar la ruta según su necesidad
			echo '<script>valor=confirm("Bienvenid@,\n'.$nombre.'");
							valor;
							if (valor == true) {
								location.href="principal/principal.php";
							} else {
								location.href="principal/principal.php";
							}
						</script>';		

		}else{

			session_start(); 

			$_SESSION['validacion'] = 0 ; // 0 quiere decir que no debe entrar

			//se niega el acceso
			echo '<script>valor=confirm("Los datos son INCORRECTOS,\nEscriba los datos nuevamente");
							valor;
							if (valor == true) {
								location.href="index.php";
							} else {
								location.href="index.php";
							}
						</script>';	
		}

	}

	}
?>