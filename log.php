<?php
include('getbrowser.php');

 class DbConfig {
    protected $serverName;
    protected $userName;
    protected $password;
    protected $dbName;
    function dbConfig() {
        $this -> serverName = 'localhost';
        $this -> userName = 'root';
        $this -> password = '';
        $this -> dbName = 'intrusion';
    }
}
class Log extends Dbconfig {	
    protected $hostName;
    protected $userName;
    protected $password;
	protected $dbName;
	private $table = 'logs';
	private $dbConnect = false;

    public function __construct(){
        if(!$this->dbConnect){ 		
			$database = new DbConfig();            
            $this -> hostName = $database -> serverName;
            $this -> userName = $database -> userName;
            $this -> password = $database ->password;
			$this -> dbName = $database -> dbName;			
            $conn = new mysqli($this->hostName, $this->userName, $this->password, $this->dbName);
            if($conn->connect_error){
                die("Error failed to connect to MySQL: " . $conn->connect_error);
            } else{
                $this->dbConnect = $conn;
            }
        }
    }
    public function successLog($matricNo, $password){
        $query = "SELECT * FROM student WHERE matricno = '$matricNo' && password = '$password'";
        $result = mysqli_query($this->dbConnect, $query);
        $row = mysqli_num_rows($result);

        $login_attempts = 0;
        $successful_logins = 0;
        $failed_login_attempts = 0;
        $malicious_attempts = 0;

        $info = "";
        $date = date("l F jS, Y - g:ia", time());
        $browser = getBrowser();
        $browser_details = $browser['name'] . "/" . $browser['version'];
        $ip_address = gethostbyname(gethostname());
        if($row == 1){
            $login_attempts += 1;
            $successful_logins += 1;
            $info = "successfully logged in"; 
        }
       $check_table =  mysqli_query($this->dbConnect, "SELECT * FROM logs WHERE client = '$ip_address'");
       $table_rows = mysqli_num_rows($check_table);
        if($table_rows == 1){
            $log_record = mysqli_fetch_assoc($check_table);

            $login_attempts += $log_record['login_attempts'];
            $successful_logins += $log_record['successfull_logins'];

            $sqlQuery1 = "UPDATE logs SET info = '$info'  WHERE client_address = '$ip_address'";   
            mysqli_query($this->dbConnect, $sqlQuery1);
            $sqlQuery2 =  "UPDATE logs SET login_attempts =  $login_attempts WHERE client_address = '$ip_address'";
            mysqli_query($this->dbConnect, $sqlQuery2);
            $sqlQuery3 =  "UPDATE logs SET successfull_logins =  $successful_logins WHERE client_address = '$ip_address'";
            mysqli_query($this->dbConnect, $sqlQuery3);
        }else{
        $sqlQuery = "INSERT INTO ".$this->table." VALUES('$ip_address', '$browser_details', '$date', '$info', '$login_attempts', '$successful_logins', '$failed_login_attempts', '$malicious_attempts')";
        mysqli_query($this->dbConnect, $sqlQuery);
        }
    }
    public function failedLog($matricNo, $password){
        $querys = array(
        "SELECT * FROM student WHERE matricno = '$matricNo' && password = '$password'", 
        "SELECT * FROM student WHERE matricno = '$matricNo'",
        "SELECT * FROM student WHERE password = '$password'"
    );
        $results = array(
        mysqli_query($this->dbConnect, $querys[0]),
        mysqli_query($this->dbConnect, $querys[1]),
        mysqli_query($this->dbConnect, $querys[2])
    );
        $rows = array(
        mysqli_num_rows($results[0]),
        mysqli_num_rows($results[1]),
        mysqli_num_rows($results[2]),        
        );

        $infos = "";
        $successful_logins = 0;
        $date = date("l F jS, Y - g:ia", time());
        $browser = getBrowser();
        $browser_details = $browser['name'] . "/" . $browser['version'];
        $ip_address = gethostbyname(gethostname());
        
        if($rows[0] == 0){
            $infos .= "Incorrect login details  ";
        }
        if(preg_match('/[^0-9]/', $matricNo)){
            $infos .= "user tried to enter an invalid matric number  ";
        }
        if($rows[1] == 1){
            $infos .= "incorrect password  ";
        }
        if($rows[2] == 1){
            $infos .= "incorrect matric number  ";
        }
        if($matricNo == ""){
            $infos .= "no matric number was entered  ";
        }
        if($password == ""){
            $infos .= "no password was entered  ";
        }
        
        $info = str_replace("  ", ",", $infos);
        $trimmed_info = substr_replace($info, ".", -1);

        include('error_cases.php');

        $check_table =  mysqli_query($this->dbConnect, "SELECT * FROM logs WHERE client_address = '$ip_address'");
        $table_rows = mysqli_num_rows($check_table);
        if($table_rows === 1){
            $sqlQuery1 = "UPDATE logs SET info = '$trimmed_info' WHERE client_address = '$ip_address'";
            mysqli_query($this->dbConnect, $sqlQuery1);

            $log_record = mysqli_fetch_assoc($check_table);

            $login_attempts += $log_record['login_attempts'];
            $failed_login_attempts += $log_record['failed_login_attempts'];
            $malicious_attempts += $log_record['malicious_attempts'];

            $sqlQuery2 = "UPDATE logs SET login_attempts = $login_attempts  WHERE client_address = '$ip_address'";
            mysqli_query($this->dbConnect, $sqlQuery2);
            $sqlQuery3 = "UPDATE logs SET failed_login_attempts = $failed_login_attempts  WHERE client_address = '$ip_address'";
            mysqli_query($this->dbConnect, $sqlQuery3);
            $sqlQuery4 = "UPDATE logs SET malicious_attempts = $malicious_attempts WHERE client_address = '$ip_address'";
            mysqli_query($this->dbConnect, $sqlQuery4);
            $sqlQuery5 = "UPDATE TABLE logs SET date = $date WHERE client_address = '$ip_address'";
            mysqli_query($this->dbConnect, $sqlQuery5);
        }else{
            // echo json_encode(array('ip_address' => $ip_address));
            $sqlQuery = "INSERT INTO " . $this->table . " VALUES('$ip_address', '$browser_details', '$date', '$trimmed_info', '$login_attempts', '$successful_logins', '$failed_login_attempts', '$malicious_attempts')";
            mysqli_query($this->dbConnect, $sqlQuery);
        }
    }

    public function tampered($error_message){
        $ip_address = gethostbyname(gethostname());
        $malicious_attempts = 1;

        $check_table =  mysqli_query($this->dbConnect, "SELECT * FROM logs WHERE client_address = '$ip_address'");
        $log_record = mysqli_fetch_assoc($check_table);
        
        $malicious_attempts += $log_record['malicious_attempts'];

        $sqlQuery1 = "UPDATE logs SET info = '$error_message' WHERE client_address = '$ip_address'";
        mysqli_query($this->dbConnect, $sqlQuery1);
        
        $sqlQuery2 = "UPDATE logs SET malicious_attempts = $malicious_attempts WHERE client_address = '$ip_address'";
        mysqli_query($this->dbConnect, $sqlQuery2);
    }
}
?>