<?php
// $username = "root";
// $server = "localhost";
// $password = "";
// $database = "intrusion";



$connection = mysqli_connect("localhost","root","","intrusion");
if($connection)
{
    echo "<script>alert('You are connected to database');</script>";
}
else{
    echo "<script>alert('You are not connected to database');</script>";

}


?>