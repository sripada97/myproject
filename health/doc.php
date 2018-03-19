<!DOCTYPE html>
<html>
<head>
	<title>DOCTOR</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
  <style>
    table{
      float:left;
      width:50%;
      position: relative;
      margin-bottom: 15px;
    }
    .container1{
      position:absolute;
      margin-top: 60px;
      margin-right: 130px;
    position: relative;
    background-color: #75c6cf;
   float:right;
    width: 29%;
    padding: 30px;
    border-radius: 3px;
}

input[type=text]{
    width: 100%;
    height: 45px;
    padding: 10px 10px;
    margin: 3px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
    border-radius: 3px;
}

  </style>
</head>

<body background="2.jpg">
	<CENTER><B><h1>DIGITALISED HEALTH MANAGEMENT SYSTEM</h1></B></CENTER>
  <form action="logout.php">
  <button style="float:right; background-color:#808080; padding:5px 10px; text-decoration: none; color:white;margin:0px; border-color:none;"><b>LOGOUT</b></button></form>
  </br></br>
	<h3 style="background-color: green; padding:5px; margin: 20px 0px 3px; width: 49.3%;" align="center" > PATIENT'S MEDICAL RECORDS</h3>
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
  <form method="POST" action="updaterec.php">
  <div class="container1" style="align:right;">
        <input type="text" name="symp" placeholder="Symptoms" required="Enter Symptoms"></br></br>
        <input type="text" name="medc" placeholder="Medicines" required="Medicines"></br></br>
        <button class="btn btn-lg btn-primary btn-block" style="font-size:17px; margin-left: 155px; width:30%; border-radius: 10px;"><B>ADD</B></button></br>
   </div>
  </form>
</body>
</html>
