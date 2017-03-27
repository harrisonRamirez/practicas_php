<html>

<body>
			
			
			
	<?php
// define una función recursiva
// función para imprimir todos los valores
// en una matriz anidada
function presentaValores($arr) {
 global $cuenta;
 global $salida;
 // verifica que los datos de entrada sean una matriz
 if (!is_array ($arr)){
 die('ERROR: Los datos de entrada no son una matriz');
 }
 // reitera en matriz
 // incrementa el contador 1 unidad por cada valor encontrado
 // si el valor encontrado es en sí una matriz:
 // invoca recursivamente la función para contar
 // el número de elementos en hijota matriz secundaria
 // en caso contrario:
 // añade el valor encontrado la matriz de salida
 foreach ($arr as $a){
 if (is_array($a)) {
 presentaValores($a);
 } else {
 $salida[] = $a;
 $cuenta++;
 }
 }
 // envía retorno al invocador del total contado y los valoresencontrados
 // como una matriz
 return array('total' => $cuenta, 'valores' => $salida);
}
// define una matriz anidada
$data = array(
 'o' => array(
 'otro',
 'oso',
 'ocio'),
 't' => array(
'té',
 'tomate',
 'tina',
 'treintaycinco' => array(
 array('treinta', 'cinco'),
 array('vingt', 'trois', array(
 'rojo' => 'barón',
 'azul' => 'sangre'
 ))
 )
 )
);
// cuenta y presenta valores de la matriz anidada
$ret = presentaValores($data);
echo $ret['total'] . ' valores encontrados: ';
echo implode(', ', $ret['valores']);
?>		
</body>

</html>