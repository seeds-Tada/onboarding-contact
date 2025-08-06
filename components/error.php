<?php
$error_mes = validation();
if(count($error_mes) !== 0) {
	?><div><?php
	foreach($error_mes as $mes) {
		?><a><?php echo($mes); ?></a><br><?php
	}
	?></div><?php
}
