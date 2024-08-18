<?php 
if (isset($_GET['bc'])) { 
	$parametro = htmlspecialchars($_GET['bc']);
	/* valores: false, true, repeated */
} else {
	$parametro = "";
}

include_once("views/main_view.php");
?>
