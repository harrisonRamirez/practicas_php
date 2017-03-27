<?php
/**
	$mysqli = new mysqli("localhost","root","123456","app");
	if($mysqli === false){die ("Error: " . mysqli_connect_error());}
	
	$consulta = "SELECT * FROM usuarios";
	$resultado = $mysqli -> query($consulta);
	echo "se encontraron ". $resultado -> num_rows . " resultados<br /><br />";
	if($resultado = $mysqli -> query($consulta) ){
		if($resultado -> num_rows > 0){
			echo "<ul>";
			while($row = $resultado -> fetch_array()){
				echo "<li>" . $row[0] ." ". $row[1]  . "</li>";
			}
			echo "</ul>";
			$resultado->close();
		}else{echo "no hay datos";}
	}else{echo "error al ejecutar sql";}
	$mysqli -> close();
	*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<title>Proyecto 7-4: Construir un formulario de ingreso</title>
	</head>
	<body>
		<h2>Proyecto 7-4: Construir un formulario de ingreso</h2>
		<?php
			// si el formulario no ha sido enviado
			// genera un nuevo formulario
			if (!isset($_POST['submit'])) {
			?>
				<form method="post" action="ingreso.php">
					Nombre de Usuario: <br />
					<input type="text" name="nombredeusuario" />
					<p>
						Contraseña: <br />
						<input type="contraword" name="contrasena" />
					<p>
						<input type="submit" name="submit" value="Ingresar" />
				</form>
		<?php
			// si el formulario ha sido enviado
			// verifica los datos proporcionados
			// contra la base de datos
			} else {
				$nombredeusuario = $_POST['nombredeusuario'];
				$contrasena = $_POST['contrasena'];
				// verifica datos de entrada
				if(empty($nombredeusuario)) {
					die('ERROR: Por favor escriba su nombre de usuario');
				}
				if(empty($contrasena)) {
					die('ERROR: Por favor escriba su contraseña');
				}
				// intenta establecer conexión con la base de datos
				try {
					$pdo = new PDO('mysql:dbname=app;host=localhost', 'root','123456');
				} catch (PDOException $e) {
					die("ERROR: No fue posible conectar: " . $e->getMessage());
				}
				// limpia los caracteres especiales de los datos de entrada
				$nombredeusuario = $pdo->quote($nombredeusuario);
				// verifica si existe el nombre de usuario
				$sql = "SELECT COUNT(*) FROM usuarios WHERE nombredeusuario =	$nombredeusuario";
				if($result = $pdo->query($sql)) {
					$row = $result->fetch();
					// si es positivo, busca la contraseña cifrada
					if($row[0] == 1) {
						$sql = "SELECT contrasena FROM usuarios WHERE nombredeusuario = $nombredeusuario";
						// cifra la contraseña ingresada en el formulario
						// la verifica contra la contraseña cifrada que reside en la base de datos
						// si ambas coinciden, la contraseña es correcta
						if ($result = $pdo->query($sql)) {
							$row = $result->fetch();
							$salt = $row[0];
							if (crypt($contrasena, $salt) == $salt) {
								echo 'Sus credenciales de acceso fueron verificadas positivamente.';
							} else {
								echo 'Ha ingresado una contraseña incorrecta.';
							}
						} else {
							echo "ERROR: No fue posible ejecutar $sql. " . print_r
						($pdo->errorInfo());
						}
					} else {
						echo 'Ha ingresado un nombre de usuario incorrecto.';
					}
				} else {
					echo "ERROR: No fue posible ejecutar $sql. " . print_r
				($pdo->errorInfo());
				}
				// cierra conexión
				unset($pdo);
			}
		?>
	</body>
</html>