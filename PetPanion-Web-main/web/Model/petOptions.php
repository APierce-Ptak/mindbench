<?php
session_start();
//print_r($_SESSION);
 $id = $_SESSION['id'];
 //$id = 50;
 $mysqli = new mysqli( "cs-database.cs.loyola.edu", "aapierce-ptak", "1765493", "paac");
 $sql ="select * from Pets where ( '$id'= ownerID)";//get first name
 $result = $mysqli->query($sql);
?>
<!DOCTYPE HTML>
<html>
<select name = "pets" id="pets">

<?php 
while($rows = $result->fetch_assoc())
{
  $petName = $rows['Name'];
 // echo $petName;
  echo "<option value='$petName'>$petName</option>";

}
?>
</select>
</html>