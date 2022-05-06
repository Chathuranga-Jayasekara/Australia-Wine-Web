<?php
include('db_conn.php');
// if(isset($_POST['add'])){
 $id = $_GET['winename'];
// $desc = $_POST['winetype'];
// $quan = $_POST['quantity'];
// $pri = $_POST['price'];
// $regi = $_POST['region'];



// $sql = "DELETE FROM winetable WHERE id=$id";

// if ($db->query($sql) === TRUE) {
//   echo "Deleted successfully";
// } else {
//   echo "error Deleted successfully";
// }


// $stmt = $pdo->prepare($sql);
// $stmt ->execute(["test", "teste", 10, 100, "vic"]);
// echo "<script>
// window.location.href='wines.php';
// alert('Item has been updated');
// </script>";
// }




if(isset($_GET['delete'])){
$id = $_GET['winename'];
echo "<h2>" . $id . "</h2>";
$sql = "DELETE FROM winetable WHERE winename = '$id'";

echo "<h2>" . $sql . "</h2>";

if ($db->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $db->error;
}

$stmt = $db->prepare($sql);
$stmt ->execute([ $id]);
echo "<script>
window.location.href='wines.php';
alert('Item has been deleted');
</script>";
}


// if (isset($_GET['delete'])) {
// 	$id = $_GET['delete'];
// 	mysqli_query($db, "DELETE FROM winetable WHERE id=$id");
// 	$_SESSION['message'] = "Location deleted!"; 
// 	header('location: wine.php');
// }


 // Using database connection file here

// $id = $_GET['winename']; // get id through query string

// $del = mysqli_query($db,"delete from winetable where id = '$id'"); // delete query

// if($del)
// {
//     mysqli_close($db); // Close connection
//     header("location:wine.php"); // redirects to all records page
//    echo "<h2>" . $t$id . "</h2>";
//     exit;	
// }
// else
// {
//     echo "Error deleting record"; // display error message if not delete
// }



?>

