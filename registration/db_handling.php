<?php

function connect_db(){
$servername="localhost:3307";
$username ="root";
$password="";
$dbname="student_db";

$conn = new mysqli($servername,$username,"",$dbname);
if($conn->connect_error)
{
  echo("connection failed: ".$conn->connect_error); 
}
return $conn;
}
?>