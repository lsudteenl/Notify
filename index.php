<?php
require_once __DIR__ . '/lineBot.php';
require_once __DIR__ . '/index_noti.php';

$bot = new Linebot();
$text = $bot->getMessageText();
$bot->reply($text);



