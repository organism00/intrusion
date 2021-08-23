<?php
$conn = mysqli_connect("localhost","root","","intrusion");
if(!$conn)
{
    echo "<script>alert('you are not connected to database');</script>";
}
?>
