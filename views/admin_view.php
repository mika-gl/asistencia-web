<?php
?>

<!DOCTYPE html>
<html lan='es'>
	<head>
		<meta name='viewport' content='width=device-width, initial-scale=1.0'>
		<meta charset='utf-8'>
		<link rel='stylesheet' href='./base.css'>
		<link rel='stylesheet' href='./base_table.css'>
		<title>Lista Asistencia</title>
	</head>
	<body>
		<div class='main-container'>
			<nav class='base-nav asistencia-nav'>
				<h1>Asistencia</h1>
			</nav>
			<main>
				<!-- tabla con todos los nombres de las cuentas de cuentas.json y a la derecha,
				una marca de si tambien se encuentran en asistencia.json -->
				<table>
					<tr>
						<th>Nombre:</th>
						<th>Correo:</th>
						<th>Presente</th>
					</tr>
					<?= $tabla ?>
						
				</table>
			</main>
		</div>
	</body>
</html>
