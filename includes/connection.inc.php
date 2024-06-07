<?php
$server_name = "localhost";
$username = "root";
$password = "";
$db = "test";

$connection = mysqli_connect($server_name, $username, $password, $db);

if(!$connection){
    die("Error". mysqli_connect_error());
}
else{
    //echo"successful";
}
?>