<?php
session_start();

$username=  $_POST['email'];
$password =  $_POST['password'];

$mysqli = new mysqli( "cs-database.cs.loyola.edu", "aapierce-ptak", "1765493", "paac");


$sql ="select firstName from Owners where ('$username' = email)"; //get first name
$result = $mysqli->query($sql);
$row = $result->fetch_assoc();
$_SESSION['username'] = $row['firstName'];


$_SESSION['email'] = $username;


$sql ="select ID from Owners where ('$username' = email)"; //check if username is correct
$result = $mysqli->query($sql);
$row = $result->fetch_assoc();

$_SESSION['id'] = $row['ID'];


print_r($_SESSION);


$encrypted = password_hash( $password, PASSWORD_BCRYPT);
$sql ="select password from Owners where ('$username' = email)"; //check if username is correct
$result = $mysqli->query($sql);
$row = $result->fetch_assoc();
if( password_verify( $password, $row['password']) )   //check if password is correct
    header("Location: ../Controller/dashBoard.php");
  
 else
   header("Location: login.php");
?>