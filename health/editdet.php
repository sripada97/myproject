<?php
session_start();
$connection=mysqli_connect('localhost','root123','anits123proj','health');
if(!$connection){
    die("database connection failed" . mysql_error($connection));
}
   $nam=$_POST['name'];
   $ag=$_POST['age'];
   $gen=$_POST['gender'];
   $ht=$_POST['ht'];
   $wt=$_POST['wt'];
   $dt=$_POST['dob'];
   $bgp=$_POST['blood'];
   $phone=$_POST['num'];
   echo $sql=" UPDATE patientdetails set name='$nam',age='$ag',gender='$gen',height='$ht',weight='$wt',dob='$dt',bloodgp='$bgp',phonenum='$phone' where paadhar='".$_SESSION['paid']."'";
    $result=mysqli_query($connection,$sql);
    if($result)
    {
    	header("Location:editdet.html");
    }
    else
    {
    
    	echo "<script type='text/javascript'>alert('Invalid aadharid')</script>";
    }
    

?>
