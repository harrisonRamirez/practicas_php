<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<title>Proyecto 4-4: Calculadora de Edades</title>
	</head>
	<body>
		<h2>Proyecto 4-4: Calculadora de Edades</h2>
		<?php
			// si el formulario no ha sido enviado
			// muestra el formulario
			if (!isset ($_POST['submit'])){
			?>
				<form method="post" action="calculaedad.php">
					Escribe tu fecha de nacimiento, en formato mm/dd/aaaa: <br />
					<input type="text" name="fdn" />
					<p>
						<input type="submit" name="submit" value="Enviar" />
				</form>
			<?php
			// si el formulario ha sido enviado
			// procesa los datos enviados
			} else {
				// divide el valor de la fecha en sus componentes
				$fechaArr = explode('/', $_POST['fdn']);
				// calcula el sello cronológico correspondiente al valor de la fecha
				$fechaTs = strtotime($_POST['fdn']);
				// calcula el sello cronológico correspondiente al día de hoy, 'today'
				$now = strtotime('today');
				// verifica si los datos han sido enviados con el formato correcto
				if (sizeof($fechaArr) != 3){
					die('ERROR: Por favor escriba una fecha válida');
				}
				// verifica si los datos insertados son una fecha válida
				if (!checkdate($fechaArr[0], $fechaArr[1], $fechaArr[2])) {
					die ('ERROR: Por favor escriba una fecha de nacimiento válida');
				}
				// verifica que la fecha sea anterior a hoy, 'today'
				if($fechaTs >= $now) {
					die('ERROR: Por favor escriba una fecha anterior al día de hoy');
				}
				// calcula la diferencia entre la fecha de nacimiento y el día de hoy en días
				// convierte en años
				// convierte los días restantes en meses
				// presenta los datos de salida
				$edadDias = floor(($now - $fechaTs) / 86400);
				$edadAnos = floor($edadDias / 365);
				$edadMeses = floor(($edadDias - ($edadAnos * 365)) / 30);
				echo "Su edad aproximada es $edadAnos años y $edadMeses meses.";
			}
			?>

	</body>
</html>