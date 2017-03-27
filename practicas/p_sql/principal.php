<?php
	// recrea sesión
	// verifica si el usuario firmadota iniciado sesión
	// de no ser así, muestra un mensaje de error y detiene el proceso
	session_start();
	if (!isset($_SESSION['nombredeusuario'])){
		die('ERROR: Ha intentado ingresar a una página restringida. Por favor <a href="login.php">Regístrese</a>.');
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	 <head>
		<title>Proyecto 9-3: Construir un formulario de ingreso mejorado</title>
	 </head>
	 <body>
		 <h2>Proyecto 9-3: Construir un formulario de ingreso mejorado</h2>
		 Ésta es la página principal de la aplicación.
		 <p>Verás esta página después de ingresar exitosamente.<p/>
	 </body>
</html>