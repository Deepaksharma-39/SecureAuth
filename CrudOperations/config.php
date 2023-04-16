<?php

$servername="localhost";
$username="root";
$password="";
$dbname="phpdb";

$conn=new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error){
    die("connection failed ghj" .$conn->connect_error);
}

?>