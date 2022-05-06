<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>SS6</title>
<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-
1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
crossorigin="anonymous"></script>
<?php
// include the database file
include('db_conn.php'); ?>
</head>
<body>
<div class="container">
<h1>Item List</h1>
</div>
<div class="container p-2">
<a href="ss6_createItem.php" class="btn btn-sm btn-secondary">Add Item</a>
<table class="table">
<tr>
<td>ID</td>
<td>Description</td>
<td>Quantity</td>
</tr>
<?php
// query for selecting or retrieving every row from the table customer
$query = "SELECT * FROM ss5_item";
//run the SQL
// query() is to execute the query in the database
$stmt = $db->query($query);
//call a method "fetch"
//PDO::FETCH_ASSOC: returns an array indexed by column name as returned in your result set
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
<tr>
<td><?php echo $row['itemID']; ?></td>
<td><?php echo $row['description']; ?></td>
<td><?php echo $row['quantity']; ?></td>
</tr>
<?php } ?>
</table>
<form method="get" action = "ss6_update.php">
<label for="itemID">Enter Item ID: </label>
<input type="text" id = "item_id" name = "item_id">
<button type = "submit" class = "btn btn-sm btn-warning" name = "update" id =
"update"> Update</button>

<form method="POST" action = "ss6_engine.php">
<label for="itemID">Enter Item ID: </label>
<input type="text" id = "item_id" name = "item_id">
<button type = "submit" class = "btn btn-sm btn-danger" name =
"delete" id = "delete"> Delete</button>
</form>

</form>
</div>
</body>
</html>