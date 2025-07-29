<?php
function error($error_mes) {
	if(count($error_mes) !== 0) {
		$output = "<div>";
		foreach($error_mes as $mes) {
			$output = $output . "<a>".$mes."</a><br>";
		}
        $output = $output . "</div>";
		echo($output);
	}
}