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

$userid =$_SESSION['userid'];
$city = strtolower($_POST['city']);
$area = strtolower($_POST['area']);
$streetname = strtolower($_POST['streetname']);
$furnish = strtolower($_POST['furnish']);
$roadname = strtolower($_POST['roaddetail']);
$pincode = $_POST['pincode'];
$address = strtolower($_POST['address']);
$rentrate = $_POST['price'];
$deposit = $_POST['deposit'];
$sqft = $_POST['sqft'];
$pgfor = strtolower($_POST['pgfor']);
$modeofhouse = strtolower($_POST['ModeOfHouse']);


$parking = strtolower($_POST['parkingStatus']);
$bathroomfacility = strtolower($_POST['bathroomfacilitypg']);
$metro = strtolower($_POST['metro']);
$image = $_FILES['housepicpg'];
$tempimage = $_FILES['housepicpg']['tmp_name'];
$imagename = $_FILES['housepicpg']['name'];
$imagetype=$_FILES['housepicpg']['type'];
$bimage = file_get_contents($tempimage);


if (isset($_POST['roomtypes'])) {
    $roomtype = implode(',', $_POST['roomtypes']);
} else {
    $roomtype = ''; 
}

if (isset($_POST['Preferredfor'])) {
    $preferredfor = implode(',', $_POST['Preferredfor']);
} else {
    $preferredfor = ''; 
}

if (isset($_POST['Foodincluded'])) {
    $foodfacility = implode(',', $_POST['Foodincluded']);
} else {
    $foodfacility = ''; 
}







include '../database/database.php';
database::$db_name = 'poovarasi_RoomHunter';
database::connection();

$sql= database::connection()->prepare("INSERT INTO housedatapg(deposit, sqft, userid, city, area, streetname, roadname, pincode, address, rentrate, pgfor, roomtype, preferredfor, foodfacility, bathroomfacility, blobimage, mimetype,furnish,parking,metro,modeofhouse) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)"  );
$sql->bind_param("iisssssisisssssssssss",$deposit, $sqft, $userid, $city, $area, $streetname, $roadname, $pincode, $address, $rentrate, $pgfor, $roomtype, $preferredfor, $foodfacility, $bathroomfacility, $bimage, $imagetype,$furnish,$parking,$metro,$modeofhouse);
$sql->execute();
$sql->close();
header("Location:../frontend_houses/mysellhouse.php");
exit();
ob_end_clean();
?>