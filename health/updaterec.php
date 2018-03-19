<?php
		session_start();
  $connection=mysqli_connect('localhost','root123','anits123proj','health');
   if(!$connection){
      die("database connection failed" . mysql_error($connection));
    }
  $sym=$_POST['symp'];
  $med=$_POST['medc']; 

  $resulta="Select doctor_name from doctor where aadharid='" . $_SESSION["daid"] . "'";
  $resultaa=mysqli_query($connection,$resulta);
  $rowa = mysqli_fetch_assoc($resultaa);

  $resultb="Select doctor_type from doctor where aadharid='" . $_SESSION["daid"] . "'";
  $resultbb=mysqli_query($connection,$resultb);
  $rowb = mysqli_fetch_assoc($resultbb);

   echo $sql=" INSERT INTO patientrecords VALUES ('" . $_SESSION["paid"] . "',CURTIME(),' " .$rowa['doctor_name'] . " ',' " . $rowb['doctor_type'] . " ','$sym','$med','not delivered')";

   $result=mysqli_query($connection,$sql);
   if($result)
   {
      header("Location:doc.php");

   }

	
?>