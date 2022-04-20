<?php

$conn = mysqli_connect("localhost", "root", "");


if (!$conn) {
    echo "Not connected to the server";
}

if (!mysqli_select_db($conn, "lazukdb")) {
    echo "Database not found.";
}

$oldManufacturer = $_POST['oldManufacturer'];
$oldMedName = $_POST['oldMedName'];
$medName = $_POST['medName'];
$manufacturer = $_POST['manufacturer'];
$batchNo = $_POST['batchNo'];
$manufactDate = $_POST['manufactDate'];
$expiryDate = $_POST['expiryDate'];

$searchQuery = "SELECT * FROM medicines Where medName='$oldMedName' AND manufacturer='$oldManufacturer'";
$res = mysqli_query($conn,$searchQuery);
$rowCount = mysqli_num_rows($res);
if($rowCount > 0){

    $updateQuery = "UPDATE medicines SET medName='$medName',manufacturer= '$manufacturer',batchNo= '$batchNo',manufactDate='$manufactDate',expiryDate='$expiryDate' WHERE medName='$oldMedName' AND manufacturer='$oldManufacturer'";

    if(!mysqli_query($conn,$updateQuery)){
        echo "Update failed";
    }
   else{
       echo 'Updated successfully';
   }
}
else{
    echo 'Medicine data not found!';
}

header("refresh:3,url=index.html");