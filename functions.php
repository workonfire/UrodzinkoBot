<?php

function status($descriptions, $status)
{
	extract($GLOBALS);
	$status = str_replace(1, STATUS_BACK, $status);
	$status = str_replace(2, STATUS_FFC, $status);
	$status = str_replace(3, STATUS_AWAY, $status);
	$status = str_replace(4, STATUS_DND, $status);
	$status = str_replace(5, STATUS_INVISIBLE, $status);
	$PushConnection->setStatus($description, $status);
}

function send($message, $recipient = '')
{
	extract($GLOBALS);
	if(!isset($recipient) || !$recipient || $recipient == '') $recipient = $from;
	$MessageBuilder->addBBcode($message);
	$MessageBuilder->setRecipients($recipient);
	$PushConnection->push($MessageBuilder);
	$MessageBuilder->clear();
}

function adminOnly()
{
	global $from;
	if($from != 542177) die("Ta funkcja nie jest dla Ciebie dostępna.\n\nJeśli uważasz, że to błąd - skontaktuj się z administratorem poprzez komendę /version.");
}

function validateDate($date, $format = 'd.m.Y')
{
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) === $date;
}

?>