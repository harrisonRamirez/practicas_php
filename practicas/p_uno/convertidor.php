<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<title>Proyecto 2-1: Convertidor Monetario USD/EUR</title>
	</head>
	<body>
		<h2>Proyecto 2-1: Convertidor Monetario USD/EUR</h2>
		<?php
			// define tasa de cambio
			// 1.00 USD = 0.70 EUR
			define ('TASA_DE_CAMBIO', 0.70);
			// define la cantidad de dólares
			$dolares = 150;
			// realiza la conversión y presenta el resultado
			$euros = $dolares * TASA_DE_CAMBIO;
			echo "$dolares USD americanos son equivalentes a: $euros EUR";
		?>
	</body>
</html>