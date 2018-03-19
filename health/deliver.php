<?php
session_start();
$connection=mysqli_connect('localhost','root123','anits123proj','health');
if(!$connection){
    die("database connection failed" . mysql_error($connection));
}
$clicked_id = $_POST['the_clicked_id'];
    $upd="UPDATE patientrecords set med_status='delivered' where aadhar='".$_SESSION['paid']."'";
    echo $upd;
         $result1=mysqli_query($connection,$upd);
         if(!$result1){
    }
    else{
        header("Location:medicineissue.php");
    }
?>

