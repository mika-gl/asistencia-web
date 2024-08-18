<?php 

//generacion de tabla TODO: implementar modificacion interactiva
function generarTabla() {
	$cuentas_raw = file_get_contents("./data/cuentas.json");
	$cuentas_json = json_decode($cuentas_raw);

	$asistencia_raw = file_get_contents("./data/asistencia.json");
	$asistencia_json = json_decode($asistencia_raw);

	$tabla = '';
	foreach ($cuentas_json as $user => $email) {
		if (isset($asistencia_json->$user)) {
			$tabla = $tabla . "<tr><td>$user</td><td>$email</td><td id='presente'>Presente</td></tr>"; 
		} else {
			$tabla = $tabla . "<tr><td>$user</td><td>$email</td><td id='ausente'>Ausente</td></tr>";
		}
	}
	return $tabla;
}

$tabla = generarTabla();

include_once("views/admin_view.php");
