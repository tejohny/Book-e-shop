<?php
$user='root';
$pass='';
$host='';
$db = 'bookstoredb';


$mysqli = new mysqli($host, $user, $pass, $db, null, '/home/student/it/2015/it154503/mysql/run/mysql.sock');
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" .
    $mysqli->connect_errno . ") " . $mysqli->connect_error;
}?>
