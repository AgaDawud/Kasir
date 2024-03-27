<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_kasir";

$dbconn = mysqli_connect($servername, $username, $password, $dbname);

if ($dbconn->connect_error) {
  echo "ERROR 404 PAGE";
  die("error!");
}

?>