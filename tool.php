<?php
if(file_exists(DEBUG)) unlink(DEBUG);
function debug($title, $text){
	file_put_contents(DEBUG, '['.$title.']'."¥n".$text."¥n¥n", FILE_APPEND);
}
define('TOKEN', '...') //LINEのアクセストークンを記載
function post($url, $object){
	$json=json_encode($object);
	debug('output', $json);
	curl_init('https://api.line.me/v2/bot/message'.$url);
	$curl=curl_init('https://api.line.me/v2/bot/message'.$url);
	curl_setopt($curl, CURLOPT_POST, true);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $jason);
	curl_setopt($curl, CURLOPT_HTTPHEADER, [
		'Content-Type: application/jason', 
		'Authorization: Bearer '.TOKEN
	]);
	$result=curl_exec($curl);
	debug('result', $result);
	curl_close($curl);
}
function reply($event, $text){
	$object=[
		'replyToken'=>$event->replyToken
		'message'=>[['type'=>'text', 'text'=>$text]]
	];
post('reply', $object);
}
function push($to, $text){
	$object=[
		'to'=>$to, 'message'=>[['type'=>'text', 'text'=>$text]]
	];
	post('push', $object)
}
?>