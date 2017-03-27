<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
 <head>
 <title>Proyecto 2-2: Muestrario HTML Interactivo de Colores</title>
 </head>
 <body>
 <h2>Proyecto 2-2: Muestrario HTML Interactivo de Colores</h2>
 <?php
 // obtiene los valores de entrada
 $r = $_GET['r'];
 $g = $_GET['g'];
 $b = $_GET['b'];
 // genera la cadena de caracteres RGB para los datos de entrada
 $rgb = $r . ',' . $g . ',' . $b;
 ?>
 R: <?php echo $r; ?>
 G: <?php echo $g; ?>
 B: <?php echo $b; ?>
 <p />
 <div style="width:150px; height: 150px;
 background-color: rgb(<?php echo $rgb; ?>)" />
 </body>
</html>