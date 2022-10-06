<?php

$serverName = "localhost:3306";
$dBUsername = "stormro6_main";
$dBPassword = "stormrobotics";
$dBName = "stormro6_users";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if(!$conn) {
    die("Connection Failed: " . mysqli_connect_error);
}