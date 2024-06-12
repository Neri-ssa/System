<?php 
include "connection.php";
$ID = $_GET['deleteId'];
$deleteId = "DELETE FROM user_form WHERE Id = $ID";
$deletequery = mysqli_query($connection, $deleteId);
header("location: read.php");
?>