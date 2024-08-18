<?php
require_once("index.php");
?>

<!DOCTYPE html>
<html lan='es'>
	<head>
		<meta name='viewport' content='width=device-width, initial-scale=1.0'>
		<meta charset='utf-8'>
		<link rel='stylesheet' href='./base.css'>
		<title>Estoy presente</title>
	</head>
	<body>
		<div class='main-container'>
			<nav class='base-nav asistencia-nav'>
				<h1>Asistencia</h1>
			</nav>
			<main>
				<form action='logic/presente.php' method='post'>
					<div>
						<div class='form-element'>
							<label for='input_name'>Nombre:</label>
							<input id='input_name' name='input_name' placeholder='Nombre' type='text' required>
						</div>
						<div class='form-element'>
							<label for='input_email'>Email:</label>
							<input id='input_email' name='input_email' placeholder='Email' type='email' required>
						</div>
						<div class='form-element'>
							<label for='input_presente'>Confirmo mi identidad</label>
							<input id='input_presente' name='input_presente' type='checkbox' required>
						</div>

					</div>
					<input class='submit-button' type='submit' value='enviar'>
					<?php
						switch ($parametro) {
							case "false":
								print('<span class="auth-success">¡Te has marcado presente!</span>');
								break;
							case "repeated":
								print('<span class="auth-error">No puedes marcarte dos veces</span>');
								break;
							case "true":
								print('<span class="auth-error">Credenciales incorrectas</span>');
								break;
							default:
								break;
						}
					?>
				</form>
			</main>
		</div>
	<script src='base.js'></script>
	</body>
</html>
