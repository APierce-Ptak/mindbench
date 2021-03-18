<?php
    session_start();
    
    $ownerID = $_SESSION['id'];
    $petName = $_POST['petName'];
    $petWeight = $_POST['petWeight'];
    $petSize = $_POST['petSize'];
    $petBreed = $_POST['petBreed'];
    $petType = $_POST['petType'];
    

    $mysqli = new mysqli( "cs-database.cs.loyola.edu", "aapierce-ptak", "1765493", "paac");
    
    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }

    $sql2 = "INSERT INTO Pets(Name, Weight, Size, Breed, OwnerID, petType) VALUES ('$petName','$petWeight','$petSize','$petBreed','$ownerID','$petType')";
    $mysqli->query($sql2);
    include("../View/dashBoard.html");
?>