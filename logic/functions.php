<?php

function authenticate($username, $password, $array) {
	foreach($array as $user => $pass) {
		if ($username == $user AND $password == $pass) {
			return true;
		}
	}
	return false;
}
?>
