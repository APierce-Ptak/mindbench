<?php
session_start();
require('config.php');
if(isset($_POST['stripeToken'])){
	\Stripe\Stripe::setVerifySslCerts(false);

	$token=$_POST['stripeToken'];

	$data=\Stripe\Charge::create(array(
		"amount"=>1000,
		"currency"=>"usd",
		"description"=>"PetPanion Service",
		"source"=>$token,
	));

	echo "<pre>";
	print_r($data); 

}


$mysqli = new mysqli( "cs-database.cs.loyola.edu", "aapierce-ptak", "1765493", "paac");
$ownerID =  $_SESSION['id'];
$sql ="UPDATE `paac`.`Owners` SET `paid` = '1' WHERE `Owners`.`ID` =$ownerID";

$result = $mysqli->query($sql);

header("Location: ../Model/appointment.php");


?>