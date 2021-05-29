<?php

$dbhost = "db"; // name of the dockerized db service
$dbuser = "appdbuser";
$password = "appdbpwd";
$db = "appdb";

try {
    $dbh = new PDO("mysql:host=$dbhost;dbname=$db", $dbuser, $password);
    echo "db connection works !";
    $dbh = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}