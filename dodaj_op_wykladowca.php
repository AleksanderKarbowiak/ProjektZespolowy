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
$lecturer_id =  $_REQUEST['lecturer_id'];
$stars = $_REQUEST['demo'];
$opinion_desc =  $_REQUEST['opinia'];

    
// Performing insert query execution
// here our table name is college
$sql = "INSERT INTO OpinionLecturers (IDLecturers, Description, Stars)  VALUES ('$lecturer_id', 
    '$opinion_desc','$stars')";

if(!mysqli_query($db, $sql)){
    die('Brak polaczenia z serwerem MySQL.<br />Blad: '.mysql_error());
}
    
// Close connection
mysqli_close($db);
header('Location: wykladowcy.php');
exit();
?>