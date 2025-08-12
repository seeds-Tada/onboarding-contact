<?php
$error_mes = validation();
if(count($error_mes) !== 0) {
	?><div><?php
	foreach($error_mes as $mes) {
		?><a style='color: red'><?php echo($mes); ?></a><br><?php
	}
	?></div><?php
}
