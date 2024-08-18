<?php
require_once('functions.php');


$provided_username = htmlspecialchars($_POST['input_name']); 
$provided_email = htmlspecialchars($_POST['input_email']);

 
/* leer cuentas y revisar si el estudiante esta en la DB */
$raw_cuentas = file_get_contents("./../data/cuentas.json");
$obj_cuentas = json_decode($raw_cuentas);
if (!authenticate($provided_username, $provided_email, $obj_cuentas)) { 
	header("Location: ./../index.php?bc=true"); //bad credentials //si no es subdom usar: / 
	exit();
}

/* leer asistencia existente y revisar si ya se marco */
$raw_asistencia = file_get_contents("./../data/asistencia.json");
$obj_asistencia = json_decode($raw_asistencia);
if ($obj_asistencia != null) {
	foreach($obj_asistencia as $user => $email) {
		if ($provided_username == $user) {
			header("Location: ./../index.php?bc=repeated"); /* repeated */
			exit();
		}
	}
}
/* creacion de json, y agregar datos de asistencia */
$asistencia_record = array($provided_username => $provided_email);
$asistencia_record_json = json_encode($asistencia_record);
$json_to_add = $asistencia_record_json;

// formateo de string json para quitar el ultimo } y el primero del nuevo string
if ($raw_asistencia != null) {
	$json_new_to_add = substr($asistencia_record_json, 1, strlen($asistencia_record_json));
	$json_old_to_add =  substr($raw_asistencia, 0, strlen($raw_asistencia) - 1);
	$json_to_add = "$json_old_to_add, $json_new_to_add";
}
/*
AGREGAR VALIDACION DE CORREO MEDIANTE CODIGO ENVIADO
*/
file_put_contents("./../data/asistencia.json",$json_to_add);

header("Location: ./../index.php?bc=false");
exit();
?>
