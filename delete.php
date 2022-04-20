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
    $deleteQuery = "DELETE FROM medicines where medName='$medName' AND manufacturer='$manufacturer'";
    if(!mysqli_query($conn,$deleteQuery)){
        echo 'Could not delete!';
    }
    else{
        echo 'Deleted successfully';
    }

    header("refresh:5,url=index.html");             
}
else{
    echo 'Data not found!';
    header("refresh:5,url=index.html");
}

?>