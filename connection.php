<?php
//define variables
error_reporting(-1);
$hostname = "localhost";
$username = "root"; //"tmminist_dilemma";
$password = ""; //"dilemma_2016";
$dbname = "tmminist_prisonersdilemma";

//making the connection to mysql
$dbc = mysqli_connect($hostname, $username, $password, $dbname) OR die("could not connect to database, ERROR: ".mysqli_connect_error());
?>
