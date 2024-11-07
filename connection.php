<?php

$server="localhost";
$username="root";
$password="";
$dbname="hospital";

$con=mysqli_connect($server,$username,$password,$dbname);
if($con)
{
    echo "";
    
}
else
{
    mysqli_connect_error();
}

?>