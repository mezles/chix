<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "rando";

//conection:
$con = mysqli_connect( $host, $user, $pass, $db ) or die( "Error " . mysqli_error( $con ) );

session_start();

require_once('functions.php');