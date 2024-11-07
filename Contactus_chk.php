<?php
include_once("connection.php");

$name=$_REQUEST['name'];
$email=$_REQUEST['email'];
$message=$_REQUEST['message'];
$query=mysqli_query($con,"insert into contact(Name,EMail,Message)
            values ('$name','$email','$message')");

if($query)
{

  
   header("Location:home.html");
   echo "<script>alert('Will Contact You Shortly')</script>";
}
else
{
    mysqli_error($con);
}