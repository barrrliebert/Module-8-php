<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'bukkutamu';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die('Error connect  to mysql');
mysqli_select_db($conn, $dbname);
?>