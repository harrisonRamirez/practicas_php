<html>
<title>Formulario 1</title>
<style>
#texto{max-width: 80%; text-align: center; margin: auto; margin-bottom: 50px; border: solid 5px #dfdfdf; padding: 10px; }
td{border:solid 1px #545454;}
.aqui{background:red;color:white;}
</style>
<body>
<?php
	if( isset($_POST['ingreso'])){
		echo '<div id="texto">';
		$inputError = false;
	
		if(empty($_POST['nombre'])){echo 'error, ingrese nombre';$inputError = true;
		}else if(empty($_POST['apellido1'])){echo 'error, ingrese apellido 1';$inputError = true;
		}else if(empty($_POST['apellido2'])){echo 'error, ingrese apelllido 2';$inputError = true;
		}else if(empty($_POST['ciudad'])){echo 'error, ingrese ciudad';$inputError = true;		}

		if($inputError === false){
			echo 'MUY BIEN <br />';
			/*conexion*/
			$mysqli = new mysqli("localhost","root","123456","practica");
			if($mysqli === false){die ("Error: " . mysqli_connect_error());}
			
			/*datos submit*/
			$nombre = $mysqli->escape_string($_POST['nombre']);
			$apellido1 = $mysqli->escape_string($_POST['apellido1']);
			$apellido2 = $mysqli->escape_string($_POST['apellido2']);
			$ciudad = $mysqli->escape_string($_POST['ciudad']);
			
			/*query*/
			$insertar = "INSERT INTO dato_persona(nombre, apellido_1, apellido_2, ciudad) VALUES ('$nombre','$apellido1','$apellido2','$ciudad')";

			/*revisar si se ingreso*/
			if($mysqli -> query($insertar) === true){
				echo "se a agregado a $nombre $apellido1 $apellido2 proviniente de $ciudad";
				//echo "<meta http-equiv='refresh' content='0'>";
			}else{echo "no se pudo ingresar los datos, contacte al administrador!";}
			$mysqli->close();
		}else{echo "error, todos los datos son requeridos";}
		echo '</div>';
	}
?>

<table>
	<tr>
		<td class="ingresar">
			<form class="form-ingreso" action="formulario1.php" method="post">
				<label>Nombre</label>
				<input type="text" name="nombre" size="40" /><br />
				<label>apellido 1</label>
				<input type="text" name="apellido1" size="40" /><br />
				<label>apellido 2</label>
				<input type="text" name="apellido2" size="40" /><br />
				<label>Ciudad</label>
				<input type="text" name="ciudad" size="40" /><br />
				<input type="submit" name="ingreso" value="submit" />
			</form>
		</td>
		<td class="consultar">
			<form class="form-ingreso" action="formulario1.php" method="post">
				<label>Ingrese nombre</label>
				<input type="text" name="c_nombre" size="40"><br />
				<input type="submit" name="consulta" value="consultar">
			</form>
		</td>
		<td class="eliminar">
			<form class="form-eliminar" action="formulario1.php" method="post">
				<label>Ingrese nombre</label>
				<input type="text" name="e_nombre" size="40"><br />
				<input type="submit" name="elimina" value="eliminar">
			</form>
		</td>
		<td class="actualizar">
			<form class="form-actualiza" action="formulario1.php" method="post">
				<label>Ingrese nombre</label>
				<input type="text" name="a_nombre" size="40"><br /><br />
				<label>Ingrese nuevo nombre</label>
				<input type="text" name="aa_nombre" size="40"><br />
				<input type="submit" name="actualiza" value="actualizar">
			</form>
		</td>
	</tr>
	<tr>
		<td class="consulta_form">
			<?php
				if( isset($_POST['consulta'])){
					$mysqli = new mysqli("localhost","root","123456","practica");
					if($mysqli === false){die ("Error: " . mysqli_connect_error());}
					
					$nombre = $mysqli->escape_string($_POST['c_nombre']);
					
					$consulta = "SELECT * FROM dato_persona WHERE nombre = '$nombre'";
					
					if($resultado = $mysqli -> query($consulta) ){
						if($resultado -> num_rows > 0){
							echo "<table><tr><td>nombre</td><td>apellido1</td><td>apellido2</td><td>ciudad</td></tr>";
								while($dato = $resultado -> fetch_array()){
									echo "<tr><td class='aqui'>". $dato[0] ."</td><td>". $dato[1] ."</td><td>". $dato[2] ."</td><td>". $dato[3] ."</td></tr>";
								}
							echo "</table>";
						}else{
							echo "No se encontraron coincidencias";
						}
					}
					$mysqli->close();
				}else if( isset($_POST['elimina'])){
					$mysqli = new mysqli("localhost","root","123456","practica");
					if($mysqli === false){die ("Error: " . mysqli_connect_error());}
					
					$nombre = $mysqli->escape_string($_POST['e_nombre']);
					
					$elimina = "DELETE FROM dato_persona WHERE nombre = '$nombre'";
					
					if($resultado = $mysqli -> query($elimina) ){
						echo "se elimino a $nombre exitosamente!";
					}else{
						echo "No se encontraron el nombre de '$nombre' y no se pudo eliminar";
					}
					$mysqli->close();
				}else if( isset($_POST['actualiza'])){
					$mysqli = new mysqli("localhost","root","123456","practica");
					if($mysqli === false){die ("Error: " . mysqli_connect_error());}
					
					$nombre = $mysqli->escape_string($_POST['a_nombre']);
					$nombrenuevo = $mysqli->escape_string($_POST['aa_nombre']);
					
					$actualiza = "UPDATE dato_persona SET nombre = '$nombrenuevo' where nombre = '$nombre'";
					
					if($resultado = $mysqli -> query($actualiza) ){
						echo "se actualizo $nombre a $nombrenuevo exitosamente!";
					}else{
						echo "No se encontraron el nombre de '$nombre' y no se pudo actualizar";
					}
					$mysqli->close();
				}
			?>
		</td>
	</tr>
	<tr>
		<td class="resultados">
			<?php
				$mysqli = new mysqli("localhost","root","123456","practica");
				if($mysqli === false){die ("Error: " . mysqli_connect_error());}
				$consulta = "SELECT * FROM dato_persona";
				
				if($resultado = $mysqli -> query($consulta) ){
					if($resultado -> num_rows > 0){
						echo "<table><tr><td>nombre</td><td>apellido1</td><td>apellido2</td><td>ciudad</td></tr>";
							while($dato = $resultado -> fetch_array()){
								echo "<tr><td>". $dato[0] ."</td><td>". $dato[1] ."</td><td>". $dato[2] ."</td><td>". $dato[3] ."</td></tr>";
							}
						echo "</table>";
					}
				}
				$mysqli->close();
			?>
		</td>
	</tr>
</table>











</body>
</html>