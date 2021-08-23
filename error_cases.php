<?php
$failed_login_attempts = 0;
$malicious_attempts = 0;
$login_attempts = 0;
switch($infos){
    case "Incorrect login details  no matric number was entered  no password was entered  ":
        $failed_login_attempts += 1;
        $login_attempts++;
        break;
        case "Incorrect login details  ":
            $failed_login_attempts += 1;
            $login_attempts++;
            break;
            case "Incorrect login details  incorrect password  ":
                $failed_login_attempts += 1;
                $login_attempts++;
                break;
                    case "Incorrect login details  incorrect password  no password was entered  ":
                        $failed_login_attempts += 1;
                        $login_attempts++;
                        break;
                        case "Incorrect login details  user tried to enter an invalid matric number  no password was entered  ":
                            $malicious_attempts++;
                            $login_attempts++;
                            break;
                            case "Incorrect login details  user tried to enter an invalid matric number  ":
                                $malicious_attempts++;
                                $login_attempts++;
                                break;
                                case "Incorrect login details  incorrect matric number  ":
                                    $login_attempts++;
                                    $malicious_attempts++;
                                    break;
}
?>