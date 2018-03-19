<?php
session_start();
$connection=mysqli_connect('localhost','root123','anits123proj','health');
if(!$connection){
    die("database connection failed" . mysql_error($connection));
}
    $daid=$_POST['aadhar'];
    $_SESSION['daid'] = $_POST['aadhar'];
    $password=$_POST['password'];
    $sql= "SELECT * FROM doctor WHERE aadharid='$daid' AND password='$password'";
    echo $sql;
    $result=mysqli_query($connection,$sql);
    $count=mysqli_num_rows($result);
    if($count>=1)
    {
    	
    	header("Location:enterpatient.html");
    }
    else
    {
    
    	echo "<script type='text/javascript'>alert('Invalid username or password')</script>";
    }
    

?>

