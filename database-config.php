<?php
session_start();
define('DBSERVER', 'localhost:3306');
define('DBUSERNAME', 'nithur');
define('DBPASSWORD', 'root');
define('DBNAME', 'biblio');

$con = mysqli_connect(DBSERVER, DBUSERNAME, DBPASSWORD, DBNAME);

if($con === false){
    die("Error: connection error.". mysqli_connect_error());
}else
?>