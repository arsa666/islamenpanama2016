<?php
header("Access-Control-Allow-Origin: *");
include('db_handler.php');
date_default_timezone_set('GMT-5');
setlocale(LC_ALL,"es_ES");

if ( $_SERVER['REQUEST_METHOD'] === 'GET') {
    $db = openDB();//open db
    //$mydate=getdate(date("U"));
    //$day = $mydate[mday];
    $month = (string)((int)date("m"));
    $day = intval(date("d"), 10);
    if($stmt = $db->prepare("SELECT * FROM NamazTimes where Mes=? and Dia=?"))
      {
        if (!$stmt->bind_param("si", $month, $day)){
          echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;

        }
        $stmt->execute();
          /* Bind results */
        $stmt->bind_result($mes, $dia, $fazar, $salidaDelSol, $makruh, $zawal, $zohar, $asar, $puesta, $magrib, $isha);
        /* Fetch the value */
        $stmt->fetch();
        $stmt->close();
        $json = array();
	$date = getDate();


	$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
	$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

	$fecha =  $dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ;


	$sehrih = strtotime($fazar);
	$sehrih = $sehrih - (10 * 60);
	$sehrih = date("H:i", $sehrih);

        $json['fecha'] = $fecha;
	$json['mes'] = $date['month'];
        $json['dia'] = $dia;
	$json['sehrih'] = $sehrih;
        $json['fajr'] = $fazar."/ 5:30";
	$json['salidaSol'] = $salidaDelSol;
        $json['zohar'] = $zohar."/ 2:00";
        $json['asar'] = $asar."/ 5:45";
        $json['magrib'] = $magrib."/".$magrib;
        $json['isha'] = $isha."/ 8:15";

	$json['fajr_comienza'] = $fazar;
        $json['zohar_comienza'] = $zohar;
        $json['asar_comienza'] = $asar;
        $json['magrib_comienza'] = $magrib;
        $json['isha_comienza'] = $isha;

	$json['fajr_central'] = "5:30";
	$json['zohar_central'] = "2:00";
	$json['asar_central'] = "6:00";
	$json['magrib_central'] = $magrib;
	$json['isha_central'] = "8:15";

	$json['fajr_jama'] = "5:30";
	$json['zohar_jama'] = "2:00";
	$json['asar_jama'] = "5:45";
	$json['magrib_jama'] = $magrib;
	$json['isha_jama'] = "8:15";

	$json['fajr_betania'] = "5:35";
	$json['zohar_betania'] = "1:15";
	$json['asar_betania'] = "5:30";
	$json['magrib_betania'] = $magrib;
	$json['isha_betania'] = "8:15";

	$json['fajr_metro'] = "5:35";
	$json['zohar_metro'] = "1:30";
	$json['asar_metro'] = "5:45";
	$json['magrib_metro'] = $magrib;
	$json['isha_metro'] = "8:00";

	$json['fajr_villa_caceres'] = "5:30";
	$json['zohar_villa_caceres'] = "1:15";
	$json['asar_villa_caceres'] = "5:45";
	$json['magrib_villa_caceres'] = $magrib;
	$json['isha_villa_caceres'] = "8:05";

	$json['fajr_carrasquilla'] = "5:20";
	$json['zohar_carrasquilla'] = "1:15";
	$json['asar_carrasquilla'] = "5:30";
	$json['magrib_carrasquilla'] = $magrib;
	$json['isha_carrasquilla'] = "8:15";

	$json['fajr_madina'] = "5:30";
	$json['zohar_madina'] = "1:45";
	$json['asar_madina'] = "5:45";
	$json['magrib_madina'] = $magrib;
	$json['isha_madina'] = "8:30";


	$json['fajr_perejil'] = "5:30";
	$json['zohar_perejil'] = "1:30";
	$json['asar_perejil'] = "5:50";
	$json['magrib_perejil'] = $magrib;
	$json['isha_perejil'] = "7:50";

	$json['fajr_loceria'] = "5:30";
	$json['zohar_loceria'] = "1:30";
	$json['asar_loceria'] = "5:35";
	$json['magrib_loceria'] = $magrib;
	$json['isha_loceria'] = "8:00";


	$json['fajr_darul_uloom_chorrera'] = "5:30";
	$json['zohar_darul_uloom_chorrera'] = "1:15";
	$json['asar_darul_uloom_chorrera'] = "5:45";
	$json['magrib_darul_uloom_chorrera'] = $magrib;
	$json['isha_darul_uloom_chorrera'] = "8:45";


	$json['fajr_penonome'] = "5:30";
	$json['zohar_penonome'] = "1:00";
	$json['asar_penonome'] = "4:00";
	$json['magrib_penonome'] = $magrib;
	$json['isha_penonome'] = "8:00";

	$json['fajr_chitre'] = $fazar;
	$json['zohar_chitre'] = "1:00";
	$json['asar_chitre'] = "4:00";
	$json['magrib_chitre'] = $magrib;
	$json['isha_chitre'] = "8:30";


	$json['fajr_santiago'] = "5:20";
	$json['zohar_santiago'] = "1:00";
	$json['asar_santiago'] = "4:00";
	$json['magrib_santiago'] = $magrib;
	$json['isha_santiago'] = "8:00";


	$json['fajr_david'] = "5:30";
	$json['zohar_david'] = "1:45";
	$json['asar_david'] = "5:00";
	$json['magrib_david'] = $magrib;
	$json['isha_david'] = "8:30";


	$json['fajr_bugaba'] = "5:30";
	$json['zohar_bugaba'] = "1:30";
	$json['asar_bugaba'] = "5:00";
	$json['magrib_bugaba'] = $magrib;
	$json['isha_bugaba'] = "8:30";

	$json['fajr_frontera'] = "5:25";
	$json['zohar_frontera'] = "1:30";
	$json['asar_frontera'] = "5:00";
	$json['magrib_frontera'] = $magrib;
	$json['isha_frontera'] = "8:30";


	$json['fajr_changuinola'] = "5:15";
	$json['zohar_changuinola'] = "1:00";
	$json['asar_changuinola'] = "4:30";
	$json['magrib_changuinola'] = $magrib;
	$json['isha_changuinola'] = "8:15";

	$json['fajr_margarita'] = $fazar;
	$json['zohar_margarita'] = $zohar;
	$json['asar_margarita'] = $asar;
	$json['magrib_margarita'] = $magrib;
	$json['isha_margarita'] = "8:00";


	$json['fajr_colon'] = $fazar;
	$json['zohar_colon'] = $zohar;
	$json['asar_colon'] = $asar;
	$json['magrib_colon'] = $magrib;
	$json['isha_colon'] = "8:00";


	echo json_encode($json);
      }
    closeDB($db);
}

?>