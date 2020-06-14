<?php
# UrodzinkoBot - wersja 1.0
# Autor: Buty935 aka Krystian
# Pożyczyłem parę funkcji od niejakiego SAdocha, gdyż nie chciało mi się ich pisać od nowa :P (functions.php)

date_default_timezone_set('GMT+1');

require_once('api/PushConnection.php');
require_once('api/MessageBuilder.php');
require_once('config.php');
require_once('functions.php');

$version = "1.0";
$msg = file_get_contents("php://input");
$part = explode(' ', $msg);
$files = scandir("database/users/");

function cmd($command)
{
	if(file_exists("database/cmd/$command.php")) include("database/cmd/$command.php");
	else die("Komenda /$command nie istnieje.");
}

if($msg{0} == '/' || $msg{0} == '.' || $msg{0} == '!')
{
	$cmd = $part[0];
	$cmd = str_replace(array('/', '.', '!'), '', $cmd);
	cmd($cmd);
	die();
}

die("UrodzinkoBot\n\nWpisz /help, by otrzymać pomoc dotyczącą bota.");

?>