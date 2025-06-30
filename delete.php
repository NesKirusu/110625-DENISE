<?php
include("connection.php");
$item = $_GET['orderID'];

$query = mysqli_query($connection, "DELETE FROM orders WHERE orderID = '$orderID'");
header("location: admin.php");
?>