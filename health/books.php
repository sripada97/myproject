<?php
error_reporting(E_ALL ^ E_NOTICE); 
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
  session_start();
    $username=$_SESSION['username'];
    $link = mysqli_connect("localhost", "root", "root", "library");
      if($link == false){ 
    die("ERROR: Could not connect. " . mysqli_connect_error());
    }
  $result=mysqli_query($link,"SELECT count(bid) as total from borrowed b where b.sid='$username' and b.returned=0");
    $data = mysqli_fetch_array($result);
  if($data[0]>=3)
      echo "<script type='text/javascript'>alert('Cannot borrow more books')</script>"; 
  else
  {
    foreach($_POST as $key => $value)
    {
        if(strpos($key, 'delete_') === 0)//checking whether the name starts with delete
        { 
            $id = substr($key, 7);//retreiving id from button name
      $sql2=mysqli_query($link,"select * from borrowed where bid='$id' and sid='$username' and returned<>2 ;");
      if(mysqli_num_rows($sql2)==0)
      {
      $result = mysqli_query($link,"select * from books b where b.bid='$id';");  
      $row = mysqli_fetch_array($result);
      $name=$row['bname'];
      $sql="update books b set b.copies=b.copies-1 where b.bid='$id';";
      $sql1="insert into borrowed(sid,bid,bname,date,returned) values('$username','$id','$name',now(),0);";

  if(mysqli_query($link, $sql)){
     if(mysqli_query($link, $sql1)){
     header("Location:home.php");
         exit();
    }
    }
        }
    else {
      echo "<script type='text/javascript'>alert('Book Already Borrowed')</script>";
    }
    }
    }
   }
}
?>
<html>
<head>
  <title>Welcome</title>
  <style>
  input[type=text] {
    width: 130px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 8px;
    font-size: 16px;
    background-color: white;
    background-image: url("search.png");
   background-size: 36px 42px;
    background-position: 1px 1px; 
    background-repeat: no-repeat;
    padding: 14px 10px 12px 40px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
}

input[type=text]:focus {
    width: 200%;  
}
  body{
    background-color : #666A68;
  }  
table {
    display:block;
    border-collapse: collapse;
    width: 100%;
}
thead{
  widht:100%;
}
th, td {
    text-align: left;
    padding: 8px;
  font-size:25px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #1B4E90;
    color: white;
  width: 38%;
}  
    #container {
  position: relative;
 
}
  #child {
  position: absolute;
  top:10;
  right:5;
}
#child1 {
  position: absolute;
  top:10;
  right:180;
}
#child2{
   position: absolute;
  top:10;
  right:380;
}
#child3{
  position:absolute;
  top :150;
  left:0;
}
#child4{
   position: absolute;
  top:10;
  left 10;
}
#child5{
   position: absolute;
  top:25;
  left:650;
  background-color:#666A68;
  font-size:20px;
}
.button {
    background-color: #1B4E90; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    border-radius:10px;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}
.button2 {
   background-color: #000000; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    border-radius:10px;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}
.form-submit-button {
border:none;
  width:100%;
  height: 40px;
  font-size: 22px;
}

  </style>
  </head>
<body>
    <div id="container">
     <div id="child1">
  <button class="button" style="float: top" onclick="location.href='purchase.php';">Borrowed</button>
  </div>
      <div id="child">
  <button class="button" style="float: bottom" onclick="location.href='logout.php';">Log out</button>
  </div>
   <div id="child2">
  <button class="button2" style="float: bottom" onclick="location.href='home.php';">Books</button>
  </div>
  <div id="child4">
  <form method="post" action="search.php">
  <input type="text" name="search" class="search" placeholder="Search..">
</form>
 </div>
   <?php 
     session_start();
    $username=$_SESSION['username'];
    ?>
     <div id="child5">
</div>
  <div id="child3">
  <table>
  <tr>
  <thead>
    <th>Book ID</th>
    <th>Book Name</th>
    <th>Copies</th>
    <th>Add</th>
  </thead>
    <tbody>
       <?php
        $link = mysqli_connect("localhost", "root", "root", "library");
 
    // Check connection
    if($link == false){ 
      die("ERROR: Could not connect. " . mysqli_connect_error());
      }
    $result = mysqli_query($link,"select * from books;");   
            while($row=mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <td><?php echo $row['bid']?></td>
                    <td><?php echo $row['bname']?></td>
                    <td><?php echo "  ".$row['copies']?></td>
           <?php
            if($row['copies'] > 0){?>
          <td> <form method="post">
          <input class = "form-submit-button" type='submit' name='delete.<?php echo $row['bid']?>' value="&#9998" onclick="home.php"/>
          </form> </td>
          <?php }
          else { ?>
            <td><?php echo "&#10060"?></td>
          <?php } ?>
                </tr>
            <?php
            }
            ?>   
      </tbody>
    </table>
    </div>
  </body>
  </html>
    