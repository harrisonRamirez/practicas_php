





<?php
	$mysqli = new mysqli("localhost","root","123456","practica");
	if($mysqli === false){die ("Error: " . mysqli_connect_error());}
	
	$consulta = "SELECT * FROM dato_persona";
	$resultado = $mysqli -> query($consulta);
	echo "se encontraron ". $resultado -> num_rows . " resultados<br /><br />";
	if($resultado = $mysqli -> query($consulta) ){
		if($resultado -> num_rows > 0){
			echo "<ul>";
			while($row = $resultado -> fetch_array()){
				echo "<li>" . $row[0] ." ". $row[1]  ." ". $row[2] ." | ciudad de ". $row[3] . "</li>";
			}
			echo "</ul>";
			$resultado->close();
		}else{echo "no hay datos";}
	}else{echo "error al ejecutar sql";}
	$mysqli -> close();
?>


<?php
/*
$mysqli = new mysqli("localhost", "usuario", "contra", "musica");
if ($mysqli === false) {
 die ("ERROR: No se estableció la conexión. " . mysqli_connect_error());
}
$consulta = "INSERT INTO artistas (artista_nombre, artista_pais) VALUES
('Kylie Minogue', 'AU')";
if ($mysqli->query($consulta)=== true) {
 echo 'Nuevo artista con id: ' . $mysqli->insert_id . 'ha sido añadido.';
} else {
 echo "ERROR: No fue posible ejecutar $consulta. " . $mysqli->error;
}

$mysqli->close();
*/
?>

<html>
<body>
<h1>...</h1>
</body>
<?php
/*
	$mysqli = new mysqli("localhost","root","123456","practica");
	if ($mysqli === false){die ("Error: " . mysqli_connect_error() );}
	$resultado = $consulta = "SELECT * FROM dato_persona";
	$resultado = $mysqli -> query($consulta);
	echo "se encontraron ". $resultado -> num_rows . " resultados<br /><br />";
		if($resultado -> num_rows > 0){
			while($row = $resultado -> fetch_array()){
				echo $row[0] . " _ " . $row[1] . " _ " . $row[2] . " _ " . $row[3] . "<br />";
			}
			$resultado->close();
		}else{
			echo "no hay datos";
		}
	$mysqli -> close();
*/
?>
</html>