<!DOCTYPE html>
<html>
<head>
	<title>MEDICINES ISSUE</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
  <style type="text/css">

  </style>
</head>
<body background="2.jpg">
<form action="homepage.html">
<button class="lgt" style="float:right; background-color:#808080; padding:5px 10px; border-radius: 0px; text-decoration: none; color:white;"><b>LOGOUT</b></button>
</form>
</br></br>
<div style="background-color: green; padding:5px; margin: 0px 0px 3px; font-size:45px " align="center" ><B>Medicines</B></div>
<div>
      <?php
      session_start();
      $paid=$_SESSION["paid"];
    $connection=mysqli_connect('localhost','root123','anits123proj','health');
    if(!$connection){
       die("database connection failed" . mysql_error($connection));
    }

      $sql = "SELECT consult_date,doctor_name,doctor_type,symptoms,medicines FROM patientrecords where aadhar='" . $_SESSION["paid"] . "' and med_status='not delivered' ";
      $result=mysqli_query($connection,$sql);
      if(!$result){
        mysqli_error($connection);
      }
print " <table border=\4\" cellpadding=\"5\" cellspacing=\"1\"   =\"#8c8c8c\" width=\"100&#37;\" id=\"AutoNumber2\" bgcolor=\"#808080\">
<tr>
<td width=100>Doctor</td> 
<td width=100>Doctor_type</td> 
<td width=100>Symptoms</td> 
<td width=100>Medicines</td> 
<td width=100>Status</td> 
</tr>"; 

while($row=mysqli_fetch_assoc($result)) 
{ 
print "<tr>";  
print "<td>" . $row['doctor_name'] . "</td>"; 
print "<td>" . $row['doctor_type'] . "</td>"; 
print "<td>" . $row['symptoms'] . "</td>";
print "<td>" . $row['medicines'] . "</td>";
print "<td>";
print "<form  action='deliver.php' method='POST'><button type='submit' name='deliver'><b>Deliver</b></button></form>";
print "</td>";
print "</tr>"; 
} 
print "</table>";

  
      ?>
</div>
</body>
</html>
