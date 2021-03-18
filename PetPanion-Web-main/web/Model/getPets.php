<?php
session_start();
//print_r($_SESSION);
 $id = $_SESSION['id'];
 $mysqli = new mysqli( "cs-database.cs.loyola.edu", "aapierce-ptak", "1765493", "paac");
 $sql ="select * from Pets where ( '$id'= ownerID)";//get first name
 $result = $mysqli->query($sql);
?>
  <table>
  <tr>
  <th>PetID</th>
   <th>Name</th>
    <th>Breed</th>
  </tr>
  <?php
  while($row = $result->fetch_assoc())
  {
  echo "<tr><td>".$row['petID']."</td><td>".$row['Name']."</td><td>".$row['Breed']."</td></tr>";
  }
  echo "</table>";
  ?>
  