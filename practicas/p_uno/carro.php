<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	“DTD/xhtml1-transitional.dtd”>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
	</head>
	<body>
		<h2>¡Éxito!</h2>
		<?php
			// obtiene los datos de entrada del formulario
			$tipo = $_POST['tipo'];
			$color = $_POST['txtColor'];
			// utiliza los datos de entrada del formulario
			echo "Tu $tipo $color está listo. ¡Maneja con cuidado!";
		?>
	</body>
</html>