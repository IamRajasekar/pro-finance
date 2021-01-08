<?php
$servername="localhost";
$username="root";
$password="";
$dbname="html";

$pno=$_GET["pno"];
$pwd=$_GET["pwd"];

$conn= new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error)
{
	die("connection failed".$conn->connect_error);
}
echo "connection sucessfully";

$sql ="SELECT pno,pwd FROM login where pno='".$pno."' and pwd='".$pwd."';";
$result=$conn->query($sql);

if($result->num_rows>0)
{
	while($row=$result->fetch_assoc())
	{
	header("Location: register.html");
	}
}
else
{
	header("Location: loger.html");
}
$conn->close();



?>