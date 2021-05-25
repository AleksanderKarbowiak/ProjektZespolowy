<?php	
session_start();
//startuje sesje i sprawdzam najpierw czy elementy formularza istnieje, jesli nie to wracam do index.php, w nastepnym if sprawdzam czy haslo = powtorz haslo
if((!isset($_POST['regname']))||(!isset($_POST['regsurname']))||(!isset($_POST['reglogin']))||(!isset($_POST['regmail']))||(!isset($_POST['regpass']))||(!isset($_POST['regrepass'])))
{
   header('Location: index.php');
   exit();
}
if($_POST['regpass'] != $_POST['regrepass'])
{
	header('Location: index.php');
	exit();
}
//pobieram dane z formularza
$login = $_POST['reglogin'];
$pass = $_POST['regpass'];
$mail = $_POST['regmail'];
$name = $_POST['regname'];
$surname = $_POST['regsurname'];
$kierunek = $_POST['kierunek'];
//lacze sie z baza
$connection = mysqli_connect('localhost', 'id16889000_basedeveloper', '123devPatrzy!','id16889000_scw_baza')
	or die('Brak polaczenia z serwerem MySQL.<br />Blad: '.mysqli_error());

	//echo "Udalo się polaczyc z serwerem!<br />";

	//$db = @mysql_select_db('id16889000_scw_baza', $connection)

	//or die('Nie moge polaczyc sie z baza danych<br />Blad: '.mysql_error());

	//echo "Udalo sie polaczyc z baza danych!";

//Sprawdzam czy user o podanych danych juz istnieje w bazie
$sql_czyIstnieje = "select Login,Email from Users where Login='".$login."' and Email='".$mail."';";
//echo $sql_czyIstnieje;
$wynik_select = mysqli_query($connection,$sql_czyIstnieje);
//echo $wynik_select;
$ilosc_wynikow = mysqli_num_rows($wynik_select);

if($ilosc_wynikow > 0)
{
	mysqli_close($connection);

    header("Location: index.php");
	exit();
}
else //Jesli nie istnieje to robie insert do tabeli, zamykam polaczenie i wracam do index.php
{
	$sql_insertNewUser="insert into Users (Name,Surname,Login,Password,FieldId,Email) values('".$name."','".$surname."','".$login."','".$pass."',1,'".$mail."')";
	$wynik=mysqli_query($connection,$sql_insertNewUser);


	mysqli_close($connection);

	header("Location: index.php");
	exit();
}
	

?>	