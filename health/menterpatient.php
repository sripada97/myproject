<?php
session_start();
$connection=mysqli_connect('localhost','root123','anits123proj','health');
if(!$connection){
    die("database connection failed" . mysql_error($connection));
}
   $paid=$_POST['paadhar'];
    $_SESSION['paid'] = $_POST['paadhar'];
    $sql= "SELECT * FROM patient WHERE paadhar='$paid'";
    echo $sql;
    $result=mysqli_query($connection,$sql);
    $count=mysqli_num_rows($result);
    if($count>=1)
    {
    	header("Location:medicineissue.php");
    }
    else
    {
    
    	echo "<script type='text/javascript'>alert('Invalid aadharid')</script>";
    }
    

?>
