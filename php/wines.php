<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>SS6</title>

  <!-- Meta tag -->
  <meta charset="UTF-8">
  <Meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <title>Explore Australian Wine</title>

<!-- Bootsrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
crossorigin="anonymous">

<!-- Bootsrap Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
crossorigin="anonymous"></script>


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
</div>
<div class="container p-2">


<!-- Button to Open the Modal -->
<button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#myModal">Add a new wine</button>

<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add a new wine</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form id="form" method = "post" action = "add.php">

  <div class="mb-3">
    <label for="winename" class="form-label">Wine Name</label>
    <input type="text" class="form-control" id="winename" name="winename" aria-describedby="winename">
    <div id="winename" class="form-text"></div>
  </div>
    
  <div class="mb-3">
    <label for="winetype" class="form-label">Type of wine</label>
  <select id="winetype" class="form-select" aria-label="winetype" name="winetype">
  <option selected>Select the region of wine</option>
  <option value="RedWine">Red Wine</option>
  <option value="WhiteWine">White Wine</option>
  <option value="SparklingWine">Sparkling Wine</option>
  </select>  
   
    
  </div>
  <div class="mb-3">
    <label for="quantity" class="form-label">Quantity</label>
    <input type="text" class="form-control" id="quantity" aria-describedby="quantity" name="quantity">
    <div id="quantity" class="form-text"></div>
  </div>
    
    <div class="mb-3">
    <label for="price" class="form-label">Price</label>
    <input type="text" class="form-control" id="price" aria-describedby="price" name="price">
    <div id="price" class="form-text"></div>
  </div>
    
       <label for="region" class="form-label">Region</label>
    
   <select id="region" class="form-select" aria-label="region" name="region">
  <option selected>Select the region of wine</option>
  <option value="TAS">TAS</option>
  <option value="VIC">VIC</option>
  <option value="NSW">NSW</option>
  <option value="WA">WA</option>
  <option value="NT">NT</option>
  </select>  
    
      <!-- Modal footer -->
      <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
         <button type="submit" class="btn btn-primary" name="add" value="add">Add</button>
      </div> </div>

    </div>
  </div>
</div>
</form>




<table class="table">
<tr>
<td>Name</td>
<td>Type</td>
<td>Quantity</td>
<td>Price</td>
<td>Region</td>
<td>Action</td>
</tr>
<?php
// query for selecting / retrieving every row from the table customer
$query = "SELECT * FROM winetable";
//run the SQL
// query() <-function to execute the query in the database
$stmt = $db->query($query);
//call a method "fetch"
//PDO::FETCH_ASSOC: returns an array indexed by column name as returned in your result set
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
<tr>
<td><?php echo $row['winename']; ?></td>
<td><?php echo $row['winetype']; ?></td>
<td><?php echo $row['quantity']; ?></td>
<td><?php echo $row['price']; ?></td>
<td><?php echo $row['region']; ?></td>
<td>
<button type = "button" class = "btn btn-sm btn-warning" name = "update" id ="edit"><a href="update.php?winename=<?php echo $row['winename']; ?>&update"> Edit</a></button>
<button type = "button" class = "btn btn-sm btn-danger" name = "delete" id ="delete"><a href="delete.php?winename=<?php echo $row['winename']; ?>&delete"> Delete</a></button>

</td>


</tr>
<?php } ?>
</table>
</div>
</body>
</html>