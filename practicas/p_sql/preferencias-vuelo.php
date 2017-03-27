<?php
	// si la forma ya ha sido enviada
	// escribe la cookie con la configuración
	if(isset($_POST['submit'])) {
		 $ret1 = (isset($_POST['nombre'])) ? setcookie('nombre',	$_POST['nombre'], mktime() + 36400, '/') : null;
		 $ret2 = (isset($_POST['asiento'])) ? setcookie('asiento', $_POST['asiento'], mktime() + 36400, '/') : null;
		 $ret3 = (isset($_POST['comida'])) ? setcookie('comida', $_POST['comida'], mktime() + 36400, '/') : null;
		 $ret4 = (isset($_POST['ofertas'])) ? setcookie('ofertas', implode(',',$_POST['ofertas']), mktime() + 36400, '/') : null;
	}
	// lee la cookie y asigna sus valores
	// a variables PHP
	$nombre = isset($_COOKIE['nombre']) ? $_COOKIE['nombre'] : '';
	$asiento = isset($_COOKIE['asiento']) ? $_COOKIE['asiento'] : '';
	$comida = isset($_COOKIE['comida']) ? $_COOKIE['comida'] : '';
	$ofertas = isset($_COOKIE['ofertas']) ? explode (',',$COOKIE['ofertas']): array();
?>
<!DOCTYPE html PUBLIC «-//W3C//DTD XHTML 1.0 Transitional//EN»
	"DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<title>Proyecto 9-1: Guardar y restaurar preferencias del usuario</title>
	</head>
	<body>
		<h2>Proyecto 9-1: Guardar y restaurar preferencias del usuario</h2>
		<h3>Seleccione sus Preferencias de Vuelo</h3>
		<?php
			// si el formulario ya ha sido enviado
			// despliega mensaje de éxito
			if (isset($_POST['submit'])) {
				echo "Gracias por su selección";
		?>
		<?php
				// si el formulario no ha sido enviado
				// muestra el formulario
			} else {
		?>
		<form method="post" action="preferencias-vuelo.php">
			Nombre: <br />
			<input type="text" size="20" name="nombre" value="" />
			<p>
				Selección de asiento: <br />
				<input type="radio" name="asiento" value="pasillo" <?php echo	($asiento == 'pasillo') ? 'checked' : ''; ?>>Pasillo</input>
				<input type="radio" name="asiento" value="ventana" <?php echo	($asiento == 'ventana') ? 'checked' : ''; ?>>Ventana</input>
				<input type="radio" name="asiento" value="centro" <?php echo ($asiento == 'centro') ? 'checked' : ''; ?>>Centro</input>
			<p>
				Selección de comida: <br />
				<input type="radio" name="comida" value="normal-veg" <?php echo ($comida == 'normal-veg') ? 'checked' : ''; ?>>Vegetariana</input>
				<input type="radio" name="comida" value="normal-nveg" <?php echo ($comida == 'normal-nveg') ? 'checked' : ''; ?>>No Vegetariana</input>
				<input type="radio" name="comida" value="diabética" <?php echo ($comida == 'diabética') ? 'checked' : ''; ?>>Diabética</input>
				<input type="radio" name="comida" value="niño" <?php echo ($comida == 'niño') ? 'checked' : ''; ?>>Niño</input>
			<p>
				Estoy interesado en ofertas especiales de los vuelos a: <br />
				<input type="checkbox" name="ofertas[]" value="LHR" <?php echo in_array('LHR', $ofertas) ? 'checked' : ''; ?>>Londres (Heathrow)</input>
				<input type="checkbox" name="ofertas[]" value="CDG" <?php echo in_array('CDG', $ofertas) ? 'checked' : ''; ?>>París</input>
				<input type="checkbox" name="ofertas[]" value="CIA" <?php echo in_array('CIA', $ofertas) ? 'checked' : ''; ?>>Roma (Ciampino)</input>
				<input type="checkbox" name="ofertas[]" value="IBZ" <?php echo in_array('IBZ', $ofertas) ? 'checked' : ''; ?>>Ibiza</input>
				<input type="checkbox" name="ofertas[]" value="SIN" <?php echo in_array('SIN', $ofertas) ? 'checked' : ''; ?>>Singapur</input>
				<input type="checkbox" name="ofertas[]" value="HKG" <?php echo in_array('HKG', $ofertas) ? 'checked' : ''; ?>>Hong Kong</input>
				<input type="checkbox" name="ofertas[]" value="MLA" <?php echo in_array('MLA', $ofertas) ? 'checked' : ''; ?>>Malta</input>
				<input type="checkbox" name="ofertas[]" value="BOM" <?php echo in_array('BOM', $ofertas) ? 'checked' : ''; ?>>Bombay</input>
			<p>
				<input type="submit" name="submit" value="Enviar" />
		</form>
		<?php
			}
		?>
	</body>
</html>