<?php 
$servername="localhost";
$username="root";
$password="";
$dbname="html";


$cn=$_POST['cn'];
$an=$_POST['an'];
$pn=$_POST['pn'];
$debt=$_POST['debt'];
$inp=$_POST['inp'];
$tm=$_POST['tm'];
$doc=$_POST ['doc'];

$conn= new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error)
{
	die("connection failed".$conn->connect_error);
}else{
  $SELECT = "SELECT an From register Where an = ? Limit 1";
  $se="SELECT pn From register Where pn = ? Limit 1";
  $INSERT = "INSERT Into register(cn,an,pn,debt,inp,tm,doc)VALUES(?,?,?,?,?,?,?)";

//Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $an);
     $stmt->execute();
     $stmt->bind_result($an);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
	 
	  $stmt = $conn->prepare($se);
     $stmt->bind_param("s", $pn);
     $stmt->execute();
     $stmt->bind_result($pn);
     $stmt->store_result();
     $rnum = $stmt->num_rows;

     //checking username
      if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("sssisis", $cn, $an, $pn, $debt, $inp, $tm, $doc);
      $stmt->execute();
      header("Location: cos.html");
     } else {
       header("Location: style.html");
     }
    
	$stmt->close();
	$conn->close();
}
?>








