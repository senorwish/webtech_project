<?php

$serverName = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "webtechdb";

$con = new mysqli($serverName,$dbuser,$dbpass,$dbname);

if($con->connect_error)
{
    die("Couldnt connect to database" . $con->connect_error);
}

echo("Connected successfully");
