<?php
session_start();

$ownerID = $_SESSION['id'];


if (isset($_SESSION['username']))
{
    
    $mysqli = new mysqli( "cs-database.cs.loyola.edu", "aapierce-ptak", "1765493", "paac");
    
    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }

    $sql="SELECT Name FROM Pets WHERE ownerID = '$ownerID'";    
    $result = $mysqli->query($sql);
    $row = $result->fetch_assoc();

    $petName = $row['Name'];

    //grab sitterID from listing
    $sql2="SELECT SitterID FROM Listing WHERE PosterID = '$ownerID'";
    $result2 = $mysqli->query($sql2);
    $row2 = $result2->fetch_assoc();

    $sitterID = $row2['SitterID'];

    //grab sitter name from sitters table
    $sql3="SELECT FirstName FROM Sitters WHERE SitterID = '$sitterID'";
    $result3 = $mysqli->query($sql3);
    $row3 = $result3->fetch_assoc();
    $sitterName = $row3['FirstName'];
    if($sitterName != NULL){
        $title =  "Sitting w/ " . $sitterName; //IMPORTANT

    }
    else{
        $title = "Sitting w/ UNDECIDED";
    }

    //grab start/end dates

    $sql4 ="SELECT StartDate FROM Listing Where PosterID = '$ownerID'";
    $result4 = $mysqli->query($sql4);
    $row4 = $result4->fetch_assoc();
    $startDate = $row4['StartDate'];


    $sql5 ="SELECT EndDate FROM Listing Where PosterID = '$ownerID'";
    $result5 = $mysqli->query($sql5);
    $row5 = $result5->fetch_assoc();
    $endDate = $row5['EndDate'];






    include("../View/dashBoard.html");
}
else
{
   header("Location: ../Model/landing.php");
}
?>
