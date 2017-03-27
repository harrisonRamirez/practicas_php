<?php
	// inicia sesión
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
 <head>
  <meta charset="UTF-8">
 <title>Proyecto 9-2: Rastrear visitas previas a la página</title>
 </head>
 <body>
 <h2>Proyecto 9-2: Rastrear visitas previas a la página</h2>
 <?php
 	date_default_timezone_set('UTC');
	 if (!isset($_SESSION['visitas'])) {
		 echo 'Esta es su primera visita.';
	 } else {
		 echo 'Visitó esta página en: <br />';
		 foreach ($_SESSION['visitas'] as $v) {
			echo date('d M Y h:i:s', $v) . '<br />';
		 }
	 }
 ?>
 </body>
</html>
<?php
// añade el sello temporal de la visita actual
$_SESSION['visitas'] [] = mktime();
?>