<?php
include('db_conn.php');
if(isset($_POST['add'])){
$id = $_POST['winename'];
$desc = $_POST['winetype'];
$quan = $_POST['quantity'];
$pri = $_POST['price'];
$regi = $_POST['region'];



$sql = "INSERT INTO winetable (winename,winetype,quantity,price,region) VALUES ('".$id."', '".$desc."',".$quan.",".$pri.",'".$regi."')";

if ($db->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "New record created successfully";
}


$stmt = $pdo->prepare($sql);
$stmt ->execute(["test", "teste", 10, 100, "vic"]);
echo "<script>
window.location.href='wines.php';
alert('Item has been updated');
</script>";
}




if(isset($_POST['update'])){
$id = $_POST['itemID'];
$desc = $_POST['description'];
$quan = $_POST['quantity'];
$sql = "UPDATE ss5_item SET description=?, quantity=? WHERE itemID = ?";
$stmt = $db->prepare($sql);
$stmt ->execute([$desc, $quan, $id]);
echo "<script>
window.location.href='ss6_item.php';
alert('Item has been updated');
</script>";
}


if(isset($_POST['delete'])){
$id = $_POST['item_id'];
$sql = "DELETE FROM ss5_item WHERE itemID = ?";
$stmt = $db->prepare($sql);
$stmt ->execute([ $id]);
echo "<script>
window.location.href='ss6_item.php';
alert('Item has been deleted');
</script>";
}
?>

if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM winetable WHERE id=$id");
	$_SESSION['message'] = "Location deleted!"; 
	header('location: index.php');
}