<?php

$acutal_date = date('d.m.Y');

$files = scandir("database/users/");

foreach($files as $f)
{
	$file = file_get_contents("database/users/".$f);
	$proper_file = explode("\n", $file);
	$date_in_file = $proper_file[0];
	$gg_number = $proper_file[1];
	$file_name_array = explode(".", $f);
	$user = $file_name_array[0];
	if($date_in_file == $actual_date)
	{
		echo "Ktoś ma dzisiaj urodzinki ^^\nPowiadomienie zostało wysłane do odpowiedniego użytkownika.";
		send("Witaj!\n\n".$user." ma dzisiaj urodziny!\nZłóż mu życzenia i wręcz prezent! <prezent>", int($gg_number));
	}
}

?>