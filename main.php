<?php
require_once('hear/hear2.php');
define('DEBUG', 'debug.txt');
require_once('tool.php');
$input=file_get_contents('php://input');
debug('input', $input);
if(!empty($input)){
	$events=json_decode($input)->events;
	foreach($events as $event){
		bot($event);
	}
}