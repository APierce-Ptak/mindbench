<?php
session_start();
$id = $_SESSION['id'];

$mysqli = new mysqli( "cs-database.cs.loyola.edu", "aapierce-ptak", "1765493", "paac");
$sql ="select * from Pets where ( '$id'= ownerID)";//get first name
$result = $mysqli->query($sql);


echo "<!DOCTYPE html>";
echo "<html>";
    echo "<head>";
        echo "<title>Edit Your Profile</title>";
        echo "<link rel='stylesheet' href='../View/dashBoard.css'>";
        echo "<link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>";
        echo "<link rel='stylesheet' href='../View/signup.css'>";
        echo "<link href='//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' rel='stylesheet' id='bootstrap-css'>";
    echo "</head>";
    echo "<nav class='navbar  sticky-top navbar-expand-lg navbar-light' id='navColor'>";
        echo "<a class='navbar-brand' href='../Model/landing.php'>";
          echo "<img src='../images/petpanion-logo.png' id='logo'>";
        echo "</a>";
        echo "<button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>";

          echo "<span class='navbar-toggler-icon'></span>";
        echo "</button>";
        echo "<h2 id='motto'></h2>";
        echo "<div class='collapse navbar-collapse' id='navbarSupportedContent'>";
          echo "<ul class='navbar-nav mr-auto'>";
            echo "</ul>";
            echo "<ul class='navbar-nav'>";
              echo "<li class='nav-item'>";
               echo "<a  class='navButton' href='../Controller/dashBoard.php'>Return to Dashboard</a>";
              echo "</li>";
          echo "</ul>";
        echo "</div>";
    echo "</nav>";
    echo "<body>";
      echo "<!--columns within the main content-->";
      echo "<main>";
        echo "<div class='dashSide'>";
        echo "</div>";

        echo "<div id='formCon2'>";
            echo "<center>Edit your pet's information</center>";
            echo "<hr>";
            echo "Please select a pet: ";
            echo "<br>";
            echo "<form action='updatePet.php' method='POST'>";
                while($row = $result->fetch_assoc()){
                    echo "<center><label><input type= 'radio' name = 'pet' value= '".$row['petID']."'>"." ".$row['Name']."</input><br/><br/></label></center>";
                    echo "<br/>";

                }

                echo "<input type='submit'>";

            echo "</form>";
        echo "</div>";

        echo "<div class='rightDashSide'>";
        echo "</div>";

      echo "</main>";

      echo "<footer id='footer'>&copy; PetPanion. All rights reserved.</footer>";

    echo "</body>";


echo "</html>";




















?>