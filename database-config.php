<?php
$database = 'biblio';
$host = 'localhost';
$user = 'nithur';
$pass = 'root';

$dbh = new PDO("mysql:dbname={$database};host={$host};port={3306}", $user, $pass);

if(!$dbh){
    echo "Error connecting to database";
}
?>