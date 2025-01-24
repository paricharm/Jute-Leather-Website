<?php
$username = "root";
$server = "localhost";
$password = "";
$db_name = "export";
$con = mysqli_connect($server,$username,$password,$db_name);
if(!$con)
{
   die("Connection failed: " . mysqli_connect_error()); 
}
?>