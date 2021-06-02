<?php  
function connect()
{  
    $db = new mysqli('localhost', 'id16889000_basedeveloper', '123devPatrzy!','id16889000_scw_baza');  
    if (! $db)
        return false;
    $db->autocommit(TRUE);
    return $db;
}
$db = connect();
if($db === false) {
    die("ERROR: Could not connect. " 
        . mysqli_connect_error());
}

   
// Taking values from the form data(input)
$tutor_id =  $_REQUEST['tutor_id'];
$stars = $_REQUEST['demo'];
$opinion_desc =  $_REQUEST['opinia'];
$author =  $_REQUEST['imie'];
    
// Performing insert query execution
// here our table name is college
$sql = "INSERT INTO OpinionTutor (IDTutor, Description, Stars, Author)  VALUES ('$tutor_id', 
    '$opinion_desc','$stars','$author')";

if(!mysqli_query($db, $sql)){
    die('Brak polaczenia z serwerem MySQL.<br />Blad: '.mysql_error());
}
    
// Close connection
mysqli_close($db);
header('Location: korepetytorzy.php');
exit();
?>