<?php
function bot_push(){
	$to='...' //送信先IDを記載
	date_default_timezone_set('Japan');
	push($to, date('G時i分になりました。お肌のゴールデンタイムは夜10時から深夜2時までですよ〜(Moon Kiss)'))
}
?>