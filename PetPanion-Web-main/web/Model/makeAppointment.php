<?php
session_start();
 include '/var/www/paac/html/includes/api_keys.php';
 //include '/var/www/paac/html/view/forward_geocode.php';
$mysqli = new mysqli( "cs-database.cs.loyola.edu", "aapierce-ptak", "1765493", "paac");

$ownerID = $_SESSION['id'];
echo $ownerID;
$sql ="select * from Owners where ( '$ownerID'= ID)";
$result = $mysqli->query($sql);
//var_dump($result);
$row = $result->fetch_assoc();
//var_dump($row);
$paid = $row['paid'];
//echo "<br>";
//echo $paid ;
$paidCheck = 1;
if($paid != $paidCheck)
{
//echo "go pay";
echo "<script>
alert('Please pay to use our services');
window.location.href='../stripe_php_payment_gateway/pay.php';
</script>";
}
else
{


$petName = $_POST['pets'];
$ownerID =  $_SESSION['id'];
$email = $_SESSION['email'];
$desc = $_POST['desc'];
$start = $_POST['start'];
$end = $_POST['end'];
$active =1;
$sleepover = $_POST['sleep'];
//echo $sleepover;
$sql ="select * from Pets where ( '$petName'= Name)";
$result = $mysqli->query($sql);
$row = $result->fetch_assoc();
$petID = $row['petID'];



$sql ="select * from Owners where ( '$ownerID'= ID)";
$result = $mysqli->query($sql);
$row = $result->fetch_assoc();
$city = $row['City'];
$state = $row['State'];
$street = $row['Street'];




    
    // Build the API request URL
    $curl = curl_init('http://www.mapquestapi.com/geocoding/v1/address?key='.$MAP_QUEST_KEY.'&location='.$street.','.$city.','.$state);

    curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER    =>  true,
        CURLOPT_FOLLOWLOCATION    =>  true,
        CURLOPT_MAXREDIRS         =>  10,
        CURLOPT_TIMEOUT           =>  30,
        CURLOPT_CUSTOMREQUEST     =>  'GET',
    ));

    // Send the API request
    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        $errorArray = array('error' => $err);
        $encodedErrorJSON = json_encode($errorArray);
        return $errorArray;
    } else {
        // Decode the JSON response
        $jsonArr = json_decode($response);

        // Access the elements needed to build the address
        $lat = $jsonArr->results[0]->locations[0]->latLng->lat;
        $long = $jsonArr->results[0]->locations[0]->latLng->lng;
        
  
    }
    
$sql= "INSERT INTO Listing(`PosterId`,`PetId`,`Description`,`StartDate`,`EndDate`,`Active`,`latitude`,`longitude`,`IsSleepover`) VALUES   ('$ownerID','$petID','$desc','$start','$end','$active','$lat','$long','$sleepover')";
$result = $mysqli->query($sql);

echo "<script>
alert('Listing Scheduled');
window.location.href='appointment.php';
</script>";














}
?>