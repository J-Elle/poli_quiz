<?php

// DATABASE HANDLER

$dbServername = "localhost"; // change when hosting
$dbUsername = "root"; // change when hosting
$dbPassword = ""; // change to online server password when hosting
$dbName = "thelazyvote";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
