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
<h1>Update Item</h1>
</div>
<?php
//Get the data related to the corresponding Item ID
if(isset($_GET['update'])){
$id = $_GET['winename'];
$stmt = $db->prepare("SELECT * FROM winetable WHERE winename = ?");
$stmt->execute([$id]);
$item = $stmt->fetch(PDO::FETCH_ASSOC);
};

if(isset($_POST['winename']))
{
$winename=$_POST['winename'];
$winetype=$_POST['type'];
$quantity=$_POST['quantity'];
$price=$_POST['price'];
$region=$_POST['region'];
$sql="UPDATE winetable SET winetype=?, quantity=?, price=?, region=? where winename=?";
$stmt=$db->prepare($sql);
$stmt->execute([$winetype,$quantity,$price,$region,$winename]);
echo "<script> window.location.href='wines.php'; alert('Item has been updated'); </script>";
}
?>
<div class="container p-2">
<form method = "post" action = "update.php">
<div class="mb-3">
<label for="winename" class="form-label">Wine Name : <?php echo
$item['winename']; ?></label>
<input type="text" class="form-control" id="winename" name="winename" value =
"<?php echo $item['winename']; ?>" hidden>
</div>

 <div class="mb-3">
    <label for="winetype" class="form-label">Type of wine</label>
  <select class="form-select" aria-label="Select the region of wine" name="type">
  <option>Select the region of wine</option>
  <option value="RedWine" <?php if($item['winetype']=='RedWine') echo "selected"; ?>>Red Wine</option>
  <option value="WhiteWine" <?php if($item['winetype']=='WhiteWine') echo "selected"; ?>>White Wine</option>
  <option value="Sparkling" <?php if($item['winetype']=='Sparkling') echo "selected"; ?>>Sparkling Wine</option>
  </select>  
   
    
  </div>

<div class="mb-3">
    <label for="quantity" class="form-label">Quantity</label>
    <input type="text" class="form-control" id="quantity" aria-describedby="quantity" name="quantity" value="<?php echo $item['quantity']; ?>">
    <div id="quantity" class="form-text"></div>
  </div>
    
    <div class="mb-3">
    <label for="price" class="form-label">Price</label>
    <input type="text" class="form-control" id="price" aria-describedby="price" name="price" value="<?php echo $item['price']; ?>">
    <div id="price" class="form-text"></div>
  </div>
    
       <label for="region" class="form-label">Region</label>
    
   <select class="form-select" aria-label="Select the region of wine" name="region">
  <option>Select the region of wine</option>
  <option value="TAS" <?php if($item['region']=='TAS') echo "selected"; ?>>TAS</option>
  <option value="VIC" <?php if($item['region']=='VIC') echo "selected"; ?>>VIC</option>
  <option value="NSW" <?php if($item['region']=='NSW') echo "selected"; ?>>NSW</option>
  <option value="WA" <?php if($item['region']=='WA') echo "selected"; ?>>WA</option>
  <option value="NT" <?php if($item['region']=='NT') echo "selected"; ?>>NT</option>
  </select>  
<br/>
 <div class="form">
         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
       
       <button type="submit" class="btn btn-primary">Update</button>
      </div> </div>

    </div>
</form>
</div>
</body>
</html>