<?php
    session_start();
    $id = $_SESSION['id'];
    $petIdentity = $_POST['pet'];

    
    $mysqli = new mysqli( "cs-database.cs.loyola.edu", "aapierce-ptak", "1765493", "paac");
    $sql ="select * from Pets where petID = '$petIdentity'";//get first name
    $result = $mysqli->query($sql);

    $row = $result->fetch_assoc();
    $petID = $row['petID'];
    $_SESSION['petName'] = $row['Name'];
    $petWeight = $row['Weight'];
    $petSize = $row['Size'];
    $petBreed = $row['Breed'];
    

    $nm = $_SESSION['petName'];
    

    include("../Controller/mypets.html");

?>