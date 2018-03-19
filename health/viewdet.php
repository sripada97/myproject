<?php
session_start();
$connection=mysqli_connect('localhost','root123','anits123proj','health');
if(!$connection){
    die("database connection failed" . mysql_error($connection));
}
    $sql= "SELECT * FROM patientdetails WHERE paadhar='". $_SESSION['paid']."'";
    $result=mysqli_query($connection,$sql);
    $row=mysqli_fetch_assoc($result);
     $paid=$row['paadhar'];
     $pswd=$row['password'];
    $name=$row['name'];
    $age=$row['age'];
    $gen=$row['gender'];
    $height=$row['height'];
    $weight=$row['weight'];
    $dob=$row['dob'];
    $bloodgp=$row['bloodgp'];
     $phn=$row['phonenum'];

?>


<!DOCTYPE html>
<html>
<head>
	<title>Health Records</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<style type="text/css">
		.cont{
    position: relative;
    background-color: #75c6cf;
    margin: 10% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    width: 25%;
    padding: 15px;

}
  .topnav {
    background-color: #333;
    overflow: hidden;
    border-radius: 0px;
 
}
.topnav a.icon{
  padding:10px 9px;
}
/* Style the links inside the navigation bar */
.topnav .abc {
    float: left;
    display: block;
    color: #f2f2f2;
    text-align: center;
    padding: 10px 9px;
    text-decoration: none;
    font-size: 17px;
}

/* Change the color of links on hover */
.topnav a:hover {
    background-color: green;
    color: black;
}

/* Add a color to the active/current link */
.topnav a.active {
    background-color: green;
    color: white;
}
.det{
	align:center;
}
	</style>

</head>

<body background="2.jpg">
	<CENTER><B><h1>DIGITALISED HEALTH MANAGEMENT SYSTEM</h1></B></CENTER>
<div class="topnav" id="myTopnav">
  <a class="abc" href="patientpage.html">Home</a>

  </div>
	<div class="cont">
		<center><h3 style="font-family: 'Times New Roman';">DETAILS</h3></center>
		<DIV class="det">
        <label><B>AADHAR: &nbsp </B><?php echo $paid; ?></label><br>
        <label><B>PASSWORD: &nbsp</B><?php echo $pswd ; ?></label><br>
		<label><B>NAME: &nbsp</B><?php echo $name ; ?></label><br>
		<label><B>AGE:&nbsp </B><?php echo $age ; ?></label><br>
        <label><B>GENDER:&nbsp </B><?php echo $gen ; ?></label><br>
		<label><B>HEIGHT:&nbsp</B> <?php echo $height ; ?></label><br>
		<label><B>WEIGHT:&nbsp</B> <?php echo $weight ; ?></label><br>
		<label><B>DOB:&nbsp</B> <?php echo $dob ; ?></label><br>
		<label><B>BLOOD GROUP:&nbsp </B><?php echo $bloodgp ; ?></label><br>
        <label><B>PHONE_NUM:&nbsp </B><?php echo $phn ; ?></label><br>
		</DIV>
	</div>
</body>
</html>
