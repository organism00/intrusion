<?php
include('../connect.php');
include('../log.php');
session_start();

$logs = new Log();


if(!isset($_SESSION['matricno']))
{
  header("Location: ../login.php");
}
$Username = $_SESSION['matricno'];

$logs->tampered($_POST['info']);
echo json_encode(array('success' => 1));
?>