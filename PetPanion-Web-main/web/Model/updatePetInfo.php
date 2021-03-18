<?php
session_start();
$id = $_SESSION['id'];

$petName = $_POST['petName'];
$newPetWeight = $_POST['petWeight'];
$newPetSize = $_POST['petSize'];
$mysqli = new mysqli( "cs-database.cs.loyola.edu", "aapierce-ptak", "1765493", "paac");
$sql = "UPDATE Pets SET Weight = '$newPetWeight', Size = '$newPetSize' WHERE Name = '$petName'";
$mysqli->query($sql);

include("../Controller/dashBoard.php");

?>
