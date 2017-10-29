<?php
require_once('push/push.php'); // プッシュするBotを変更するときはここのパスを変える
define('DEBUG', 'debug_push.txt');
require_once('tool.php');
bot_push();
?>