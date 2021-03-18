<?php
echo "test";
session_start();

//$firstName = mysqli_real_escape_string($mysqli,$_POST['fname']);
$firstName = $_POST['fname'];
$lastName = $_POST['lname'];
$street = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$zipcode = $_POST['zipcode'];
$email = $_POST['email'];
$password = $_POST['pword'];
$phone = $_POST['phone'];
$_SESSION['username'] = $firstName;
$_SESSION['email'] = $email;
$mysqli = new mysqli( "cs-database.cs.loyola.edu", "aapierce-ptak", "1765493", "paac");
echo "test";

echo "<br>";
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

echo "<br>";

//$sql ="INSERT INTO paac.Owners(ID,firstName,lastName,Street,City,State,Zipcode,Email,password,Phone) VALUES (NULL,'$firstName','$lastName','$address','$city','$state','$zipcode','$email','$password','$phone')";
//$sql ="INSERT INTO Owners(`firstName`, `lastName`, `Street`, `City`, `State`, `Zipcode`, `Email`, `password`, `Phone`) VALUES (\'fname\', \'lname\', \'street\', \'city\', \'state\', \'12345\', \'email\', \'password\', \'1234554321\')";

$encrypted = password_hash( $password, PASSWORD_BCRYPT);
$sql= "INSERT INTO Owners(`firstName`,`lastName`,`Street`,`City`,`State`,`Zipcode`,`Email`,`password`,`Phone`) VALUES ('$firstName','$lastName','$address','$city','$state','$zipcode','$email','$encrypted','$phone')";

//
echo $sql;
//echo "<br>";
//echo "<br>";
$result = $mysqli->query($sql);
echo "<br>";
echo $result;
echo "<br>";
echo "test";

//echo $result;
header("Location: ../Controller/dashBoard.php");
?>
