<?php
$servername="localhost";
$username="root";
$password="";
$dbname="html";

$id=$_GET["id"];

$conn= new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error)
{
	die("connection failed".$conn->connect_error);
	}

$sql = "SELECT id, inp, debt FROM register where  id='".$id."';";
$result=$conn->query($sql);


if (mysqli_num_rows($result) > 0) {
   $row = mysqli_fetch_assoc($result);
   $n=($row['debt']*$row['inp'])/100;
	   echo "ineterest of amount :$n";
		
 
} else {
    echo "0 results";
}

mysqli_close($conn);
?>