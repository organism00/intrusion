<?php
include("../connect.php");
include('../log.php');
session_start();

$logs = new Log();

    $MatricNo = mysqli_real_escape_string($conn, $_REQUEST['matricno']);
    $Password = mysqli_real_escape_string($conn, $_REQUEST['password']);

    // creating a hash (cryptography) function for password
    // $Key = "ADULT".$Password."XTRA";
    // $Hash = hash('sha512',$Key);
    // $Password = md5($Hash, true);

    // selecting data from database
		$sql = "SELECT * FROM student WHERE matricno = '$MatricNo' and password = '$Password'";
    $result = mysqli_query($conn, $sql);
    //get records from table:
    $record = mysqli_fetch_assoc($result);

    $Row = mysqli_num_rows($result);
		if($Row == 1)
		{
      //using username as my session parser
      $_SESSION['matricno'] = $MatricNo;
      $logs->successLog($MatricNo, $Password);
      echo json_encode(array('success' => 1));
		}else{
      $logs->failedLog($MatricNo, $Password);
           echo json_encode(array('success' => 0));
		}
	

?>