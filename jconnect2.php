<?php

echo "<br> The time is " . date("h:i:sa");
echo "<br><br>";

$host='localhost';
$db = 'routinelocations';
$username = 'postgres';
$password = 'Ri0grande22\\';
 
$dsn = "pgsql:host=$host;port=58079;dbname=$db;user=$username;password=$password";
 
try{
 // create a PostgreSQL database connection
 $conn = new PDO($dsn);
 
 // display a message if connected to the PostgreSQL successfully
 if($conn){
 echo "Connected to the <strong>$db</strong> database successfully!";
 }
}catch (PDOException $e){
 // report error message
 echo $e->getMessage();
}

?>
