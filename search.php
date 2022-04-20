<?php 

// Stublish connection to the server
$conn = mysqli_connect("localhost","root","");
if(!$conn){
    echo 'Server is not cennected';
}
if(!mysqli_select_db($conn,"lazukdb")){
    echo 'database not found';
}

$manufacturer = $_POST['manufacturer'];
$medName = $_POST['medName'];

$searchQuery = "SELECT * FROM medicines where medName='$medName' AND manufacturer='$manufacturer'";

$res = mysqli_query($conn,$searchQuery);
$rowCount = mysqli_num_rows($res);

if($rowCount > 0){
    while($row = $res->fetch_assoc()) {
      echo "<p> Name: ".$row['medName']." Manufacturer: ".$row['manufacturer']."</p>";
      }

    header("refresh:5,url=index.html");             
}
else 'Not found!';
header("refresh:5,url=index.html");             

?>