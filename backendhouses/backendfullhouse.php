<?php
session_start();
ob_start();
if(isset($_SESSION['userid'])){
    echo('login status Green');
}
else{
    header("Location:../frontend_authentication/Login.php");
    exit();
}

$city = strtolower($_POST['city']);
$area = strtolower($_POST['area']);
$streetname = strtolower($_POST['streetname']);
$roadname = strtolower($_POST['roaddetail']);
$pincode = $_POST['pincode']; 
$address = strtolower($_POST['address']);
$rentrate = $_POST['price'];
$deposit = $_POST['deposit'];
$sqft = $_POST['sqft'];
$modeofhouse = strtolower($_POST['ModeOfHouse']);

$houseavailable = $_POST['houseavailable'];

$propertytype = json_encode($_POST['propertytype']);
$furnish = strtolower($_POST['furnish']);
$parkingstatus = strtolower($_POST['parkingStatus']);
$metro = strtolower($_POST['metrofh']);
$image = $_FILES['housepic'];
$tempimage = $_FILES['housepic']['tmp_name'];
$imagename = $_FILES['housepic']['name'];
$imagetype=$_FILES['housepic']['type'];
$bimage = file_get_contents($tempimage);
$userid = $_SESSION['userid'];
if (isset($_POST['HousingType']) && is_array($_POST['HousingType'])) {
    $housetype = implode(',', $_POST['HousingType']);
} else {
    $housetype = ''; 
}

if (isset($_POST['preferredtenates']) && is_array($_POST['preferredtenates'])) {
    $preferredtennets = implode(',', $_POST['preferredtenates']);
} else {
    $preferredtennets = ''; 
}


include '../database/database.php';
database::$db_name = 'poovarasi_RoomHunter';
database::connection();

$sql = database::$connection->prepare("INSERT INTO housedatafullhouse(deposit, sqft, city, area, streetname, roadname, pincode, address, rentrate, modeofhouse, housetype, availability, preferredtennets, propertytype, furnish, parkingstatus, blobimage, mimetype, userid,metro) 
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?);");

$sql->bind_param("iissssisisssssssssss",$deposit, $sqft, $city, $area, $streetname, $roadname, $pincode, $address, $rentrate, $modeofhouse, $housetype, $houseavailable, $preferredtennets, $propertytype, $furnish, $parkingstatus, $bimage, $imagetype, $userid,$metro);
$sql->execute();

$sql->close();
header("Location:../frontend_houses/mysellhouse.php");
exit();
ob_end_clean();
?>