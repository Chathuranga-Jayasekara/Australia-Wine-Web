<?php
//Define variable to where the database file is
$dbFile ='/var/www/html/crjjm/phpliteadmin/db/crjjm.db';
try {
//Define PDO
$db = new PDO("sqlite:$dbFile");
//set the PDO error mode to exception
$db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
echo "Connected successfully";
} catch(PDOException $e) {
//send error message when connection failed
echo "Connection failed: " . $e->getMessage();
}
?>