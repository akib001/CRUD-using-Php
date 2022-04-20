<?php

// Stublish connection to the server
$conn = mysqli_connect("localhost", "root", "");

if (!$conn) {
    echo "Not connected to the server";
}

if (!mysqli_select_db($conn, "lazukdb")) {
    echo "Database not found.";
}

$medName = $_POST['medName'];
$manufacturer = $_POST['manufacturer'];
$batchNo = $_POST['batchNo'];
$manufactDate = $_POST['manufactDate'];
$expiryDate = $_POST['expiryDate'];

// $insertQuery = "INSERT INTO medicines (medName,manufacturer,batchNo,manufactDate,expiryDate) VALUES ('$medName','$manufacturer','$batchNo','$manufactDate','$expiryDate')";
$insertQuery = "INSERT INTO medicines (medName,manufacturer,batchNo,manufactDate,expiryDate) VALUES ('$medName','$manufacturer','$batchNo','$manufactDate','$expiryDate')";

if (!mysqli_query($conn, $insertQuery)) {
    echo "Insertion failed!";
} else {
    echo 'Successfully added';
}

header("refresh:5,url=index.html");

?>
