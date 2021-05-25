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
$connection = mysqli_connect('localhost', 'id16889000_basedeveloper', '123devPatrzy!','id16889000_scw_baza')
	or die('Brak polaczenia z serwerem MySQL.<br />Blad: '.mysql_error());

	

	//$db = @mysql_select_db('id16889000_scw_baza', $connection)

	//or die('Nie moge polaczyc sie z baza danych<br />Blad: '.mysql_error());

	

//Sprawdzam czy user o podanych danych juz istnieje w bazie
$sql_czyIstnieje = "select Id,Login,Password from Users where Login='".$login."' and Password='".$pass."';";
$wynik_select = mysqli_query($connection,$sql_czyIstnieje);
$ilosc_wynikow = mysqli_num_rows($wynik_select);
$rekord = mysqli_fetch_row($wynik_select);
$_SESSION['id_uzytkownika'] = $rekord[0];

if($ilosc_wynikow > 0)
{
	mysqli_close($connection);

	header("Location: materialy.php");
	exit();
}
else //Jesli nie istnieje to wracam do index.php
{

	mysqli_close($connection);


	header("Location: index.php");
	exit();
}
	
?>