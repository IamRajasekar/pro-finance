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
echo "connection sucessfully";

$sql ="SELECT id FROM register where  id='".$id."';";
$result=$conn->query($sql);


if($result->num_rows>0)
{
	while($row=$result->fetch_assoc())
	{
	header("Location: new2.html");
	 echo " hi";
	}
}
$conn->close();



?>