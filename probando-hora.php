<?php 

$hora = new DateTime("now", new DateTimeZone('America/Bogota'));
echo $hora->format('G')."<br>";

$horario_atencion = array(
  
   "6:00",
   "6:20",
   "6:40",
   "7:00",
   "7:20",
   "7:40",
   "8:00",
   "8:20",
   "8:40",
   "9:00",
   "9:20",
   "9:40",
   "10:00",
   "10:20",
   "10:40",
   "11:00",
   "11:20",
   "11:40",
   "12:00",
   "12:20",
   "12:40",
   "13:00",
   "13:20",
   "13:40",
   "14:00",
   "14:20",
   "14:40",
   "15:00",
   "15:20",
   "15:40",
   "16:00",
   "16:20",
   "16:40",
   "17:00",
   "17:20",
   "17:40",
   "18:00",
);

  foreach ($horario_atencion as $key) {
  	$porcion = $key.explode(":", $horario_atencion)
  	if (strcmp($hora, $var2) !== 0) {

  	}
  	if($hora $porcion[0]){
  		echo $key."<br>";
  	}
   	
   		
   
   }

?>