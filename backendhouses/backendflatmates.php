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

$userid = $_SESSION['userid'];
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

$allowedtenant = strtolower($_POST['TenantFor']);
$furnish = strtolower($_POST['furnish']);
$propertytype = strtolower($_POST['propertytype']);
$allowedfood = strtolower($_POST['showonly']);
$floor = $_POST['floors'];
$parkingtype = strtolower($_POST['parkingStatus']);
$metro = strtolower($_POST['metrofm']);
$bathroom = $_POST['bathroomfacility'];
$image = $_FILES['housepics'];
$tempimage = $_FILES['housepics']['tmp_name'];
$imagename = $_FILES['housepics']['name'];
$imagetype=$_FILES['housepics']['type'];
$bimage = file_get_contents($tempimage);
if (isset($_POST['RoomType']) && is_array($_POST['RoomType'])) {
    $roomtype = implode(',', $_POST['RoomType']);
} else {
    $roomtype = ''; 
}

include '../database/database.php';
database::$db_name = 'poovarasi_RoomHunter';
database::connection();

$sql= database::connection()->prepare("INSERT INTO housedataflathouse(deposit, sqft, userid, city, area, streetname, roadname, pincode, address, rentrate, modeofhouse, roomtype, allowedtenant, furnish, propertytype, allowedfood, floor, parkingtype, bathroom, blobimage, mimetype,metro) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
$sql->bind_param("iisssssisissssssssssss",$deposit, $sqft, $userid, $city, $area, $streetname, $roadname, $pincode, $address, $rentrate, $modeofhouse, $roomtype, $allowedtenant, $furnish, $propertytype, $allowedfood, $floor, $parkingtype, $bathroom, $bimage, $imagetype,$metro);
$sql->execute();
$sql->close();
header("Location:../frontend_houses/mysellhouse.php");
exit();
ob_end_clean();

?>