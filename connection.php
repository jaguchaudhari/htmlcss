<?php
//Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$database = "notes";

//Create a Connection
$conn = mysqli_connect($servername,$username,$password,$database);
//Die if connection was not successful
if(!$conn){
  die("Sorry we failed to connect: ".mysqli_connect_error());
}
else{
  echo "Connection was successful<br>";
}
?>