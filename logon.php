<?php	
session_start();
//startuje sesje i sprawdzam najpierw czy elementy formularza istnieje, jesli nie to wracam do index.php
if((!isset($_POST['logonlogin']))||(!isset($_POST['logonpassword'])))
{
   header('Location: index.php');
   exit();
}

//pobieram dane z formularza
$login = $_POST['logonlogin'];
$pass = $_POST['logonpassword'];

//lacze sie z baza
$connection = @mysql_connect('localhost', 'id16889000_basedeveloper', '123devPatrzy!')
	or die('Brak polaczenia z serwerem MySQL.<br />Blad: '.mysql_error());

	

	$db = @mysql_select_db('id16889000_scw_baza', $connection)

	or die('Nie moge polaczyc sie z baza danych<br />Blad: '.mysql_error());

	

//Sprawdzam czy user o podanych danych juz istnieje w bazie
$sql_czyIstnieje = "select Login,Password from Users where Login='".$login."' and Password='".$pass."';";
$wynik_select = mysql_query($sql_czyIstnieje);
$ilosc_wynikow = mysql_num_rows($wynik_select);

if($ilosc_wynikow > 0)
{
	mysql_close($connection);

	header("Location: mainstrona.html");
	exit();
}
else //Jesli nie istnieje to wracam do index.php
{
	echo "Błędne dane!";


	mysql_close($connection);


	header("Location: index.php");
	exit();
}
	
?>