<?php
if(!isset($part[1])) die("Użycie komendy /birth:\n\n/birth add [imię] [data] - dodaje przypomnienie do bazy danych\nPrzykład: /birth add Krystian 26.06.2018\nUWAGA! W związku z tym, że nie tylko jedna osoba może mieć to samo imię, nie zdziw się, jeśli bot zmieni imię np. z Krystian na Krystian_1");
if($part[1] == "add")
{
	if(!isset($part[2]) || !isset($part[3])) die("Podaj wymagane informacje.");
	else
	{
		$username = $part[2];
		$birthdate = $part[3];
		if(validateDate($birthdate) !== 1) die("Format daty jest nieprawidłowy.\n\nPrzykład poprawnego zapisu daty: 26.06.2018");
		foreach($files as $f)
		{
			if($f == $username.".dat")
			{
				$username = $username."_".rand(1, 50);
				echo "Użytkownik o tym imieniu już istnieje, więc jego nazwa została zmieniona na $username.";
			}
		}
		$new_file = fopen("database/users/".$username.".dat", 'w');
		fwrite($new_file, $birthdate."\n".$from);
		fclose($new_file);
		die("Pomyślnie ustawiono przypomnienie o urodzinach użytkownika $username dla numeru $from.");
	}
}
?>