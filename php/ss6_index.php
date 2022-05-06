<?php
// include a database file
include ('db_conn.php');
// query for selecting / retrieving every row from the table customer
$query = "SELECT * FROM ss5_customer";
//run the SQL
//this query() function executes the query in the database
$stmt = $db->query($query);
//call a method "fetch"
//PDO::FETCH_ASSOC: returns an array indexed by column name as returned in your result set
while ($row = $stmt ->fetch(PDO::FETCH_ASSOC)){
echo $row['custID'];
echo $row['lastname'];
echo $row['firstname'];
echo $row['email'];
echo "<br>";
}$db = null;
?>