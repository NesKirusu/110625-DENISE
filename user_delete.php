<?php
include("connection.php");
$orderID = $_GET['orderID'];

$query = mysqli_query($connection, "DELETE FROM orders WHERE orderID = '$orderID'");
header("location: view_orders.php");
?>