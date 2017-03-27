<?php
// si el formulario no ha sido enviado
// muestra el formulario
if (!isset($_POST['submit'])) {
	$nombredeusuario = (isset($_COOKIE['nombre'])) ? $_COOKIE['nombre'] : '';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
 <head>
	<title>Proyecto 9-3: Construir un formulario de ingreso mejorado</title>
 </head>
 <body>
	 <h2>Proyecto 9-3: Construir un formulario de ingreso mejorado</h2>
	 <form method="post" action="ingreso.php">
		 Nombre de Usuario: <br />
		 <input type="text" name="nombredeusuario" value="<?php echo $nombredeusuario; ?>"/>
		 <p>
		 Contraseña: <br />
		 <input type="password" name="contrasena" />
		 <p>
		 <input type="checkbox" name="rastreo" checked />
		 Recuérdame
		 <p>
		 <input type="submit" name="submit" value="Ingresar" />
	 </form>
 </body>
</html>
<?php
	// si el formulario ha sido enviado
	// verifica los datos proporcionados
	// contra la base de datos
}else{
	$nombredeusuario = $_POST['nombredeusuario'];
	$contrasena      = $_POST['contrasena'];
	// verifica datos de entrada
	if (empty($nombredeusuario)) {
		die('ERROR: Por favor escriba su nombre de usuario');
	}
	if (empty($contrasena)) {
		die('ERROR: Por favor escriba su contraseña');
	}
 
 
	// intenta establecer conexión con la base de datos
	try {
		$pdo = new PDO('mysql:dbname=app;host=localhost', 'root', '123456');
	}
	catch (PDOException $e) {
		die("Error: No fue posible conectar: " . $e->getMessage());
	}
	
	// limpia los caracteres especiales de los datos de entrada
	$nombredeusuario = $pdo->quote($nombredeusuario);
	
	// verifica si existe el nombre de usuario
	$sql = "SELECT COUNT(*) FROM usuarios WHERE nombredeusuario = $nombredeusuario";
	if ($result = $pdo->query($sql)) {
		$row = $result->fetch();
		// si es positivo, busca la contraseña cifrada
		if ($row[0] == 1) {
			$sql = "SELECT contrasena FROM usuarios WHERE nombredeusuario = $nombredeusuario";
			// cifra la contraseña ingresada en el formulario
			// la verifica contra la contraseña cifrada que reside en la basede datos
			// si ambas coinciden, la contraseña es correcta
			if ($result = $pdo->query($sql)) {
				$row  = $result->fetch();
				$salt = $row[0];
				if (crypt($contrasena, $salt) == $salt) {
					// contraseña correcta
					// inicia una nueva sesión
					// guarda el nombre del usuario para la sesión
					// de requerirse, establece una cookie con el nombre de usuario
					// redirecciona el explorador a la página principal de la aplicación
					session_start();
					$_SESSION['nombredeusuario'] = $nombredeusuario;
					if ($_POST['rastreo']) {
						setcookie('nombre', $_POST['nombredeusuario'], mktime() + 86400);
					}
					header('Location: principal.php');
				} else {
					echo 'Ha ingresado una contraseña incorrecta.';
				}
			} else {
				echo "ERROR: No fue posible ejecutar $sql. " . print_r($pdo->errorInfo());
			}
		} else {
			echo 'Ha ingresado un nombre de usuario incorrecto.';
		}
	} else {
		echo "ERROR: No fue posible ejecutar $sql. " . print_r($pdo->errorInfo());
	}
	// cierra conexión
	unset($pdo);
}
?> 

 