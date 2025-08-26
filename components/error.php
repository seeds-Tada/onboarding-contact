<?php
$error_mes = validation();
if(count($error_mes) !== 0) {
	?><div><?php
	foreach($error_mes as $mes) {
		?><span style='color: red'><?php echo($mes); ?></span><br><?php
	}
	?></div><?php
}
