<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<title>Proyecto 3-1: Verificador de Numeros Pares y Nones</title>
	</head>
	<body>
		<h2>Proyecto 3-1: Verificador de Numeros Pares y Nones</h2>
		<?php
			// si el formulario aún no ha sido enviado
			// muestra el formulario
			if (!isset ($_POST['submit'])) {
		?>
		<form method="post" action="paresnones.php">
			Ingrese un número: <br />
			<input type="text" name="num" size="3" />
			<p>
			<input type="submit" name="submit" value="Enviar" />
		</form>
		<?php
			// si el formulario ha sido enviado
			// procesa los datos de entrada del formulario
			} else {
				//recupera el número enviado en el formulario
				$num = $_POST['num'];
				// prueba el valor para los números nones
				// muestra el mensaje apropiado
				if (($num % 2) == 0) {
					echo 'Usted ha escrito ' . $num . ', que es un numero par.';
				} else {
					echo 'Usted ha escrito ' . $num . ', que es un numero non.';
				}
			}
		?>
		</body>
	</html>