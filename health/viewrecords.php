<!DOCTYPE html>
<html>
<head>
	<title>Health Records</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
<style type="text/css">
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
    background-color: #006400;
    color: black;
}

/* Add a color to the active/current link */
.topnav a.active {
    background-color: #006400;
    color: white;
}
</style>
</head>
<body background="2.jpg">
<h1 align="center">DIGITALISED HEALTH MANAGEMENT SYSTEM</h1>

 <div class="topnav" id="myTopnav">
  <a class="abc" href="patientpage.html">Home</a>
  </div>
  <br>
<h3 style="background-color: green; padding:5px; margin: 0px 0px 3px; " align="center" > PATIENT'S MEDICAL RECORDS</h3>
      <?php
      session_start();
    $connection=mysqli_connect('localhost','root123','anits123proj','health');
    if(!$connection){
       die("database connection failed" . mysql_error($connection));
    }
      $sql = "SELECT consult_date,doctor_name,doctor_type,symptoms,medicines FROM patientrecords where aadhar='" . $_SESSION["paid"] . "' ";
      $result=mysqli_query($connection,$sql);
      if(!$result){
        mysqli_error($connection);
      }
print " <table border=\"4\" cellpadding=\"5\" cellspacing=\"1\"   =\"#8c8c8c\" width=\"100&#37;\" id=\"AutoNumber2\" bgcolor=\"#808080\">
<tr>
<td width=100>Consulted date</td> 
<td width=100>Doctor</td> 
<td width=100>Doctor_type</td> 
<td width=100>Symptoms</td> 
<td width=100>Medicines</td> 
</tr>"; 

while($row=mysqli_fetch_assoc($result)) 
{ 
print "<tr>"; 
print "<td>" . $row['consult_date'] . "</td>"; 
print "<td>" . $row['doctor_name'] . "</td>"; 
print "<td>" . $row['doctor_type'] . "</td>"; 
print "<td>" . $row['symptoms'] . "</td>";
print "<td>" . $row['medicines'] . "</td>";
print "</tr>"; 
} 
print "</table>";

  
      ?>
</body>
</html>
