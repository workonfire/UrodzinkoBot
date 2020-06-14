<?php
$from = $_GET['from'];
$to = $_GET['to'];
$botapi_login = '';
$botapi_pass = '';
$MessageBuilder = new MessageBuilder;
$PushConnection = new PushConnection($to, $botapi_login, $botapi_pass);
?>