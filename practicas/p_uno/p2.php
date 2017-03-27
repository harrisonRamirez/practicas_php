<html>
<body>



<?php
// crea objeto
$carro = new Automovil;
// establece las propiedades del objeto
$carro->color = 'rojo';
$carro->modelo = 'Ford Taurus';
// invoca los métodos del objeto
$carro->acelerador();
$carro->direccion();
?>


<?php
// define una clase
class Automovil {
 // propiedades
 public $color;
 public $modelo;
 public $velocidad = 55;
 // métodos
 public function acelerador(){
 $this->velocidad += 10;
 echo 'Aumenta la velocidad a ' . $this->velocidad . '...';
 echo "<br />";
 }
 public function freno(){
 $this->velocidad -= 10;
 echo 'Disminuye la velocidad a ' . $this->velocidad . '...';
  echo "<br />";
 }
  public function direccion(){
 $this->freno();
 echo 'Da una vuelta...';
  echo "<br />";
 $this->acelerador();
 }
}
?>



<?php
// crea objeto
$carro = new Automovil;
// invoca métodos
// datos de salida: 'Acelerador a 65...'
// 'Freno a 55...'
// 'Da una vuelta...'
// 'Acelerador a 65...'
$carro->acelerador();
$carro->direccion();
?>
</body>
</html>