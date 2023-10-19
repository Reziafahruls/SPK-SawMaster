<!-- // include/conn.php -->
<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "db_saw";

// Create a database connection
$db_saw = new mysqli($host, $username, $password, $database);

// Check the connection
if ($db_saw->connect_error) {
    die("Connection failed: " . $db_saw->connect_error);
}
?>