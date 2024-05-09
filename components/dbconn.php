<?php
$server_name = "";
$username = "";
$password = "";
$db_name = "";
$conn = mysqli_connect($server_name,$username,$password,$db_name);
// Control values
$month_name;
function fetchValues($Sln){
    global $conn;
    $sql_control = "SELECT * FROM `controls` WHERE `Sl no.` = '$Sln';";
$res_control = mysqli_query($conn,$sql_control);
    if ($res_control) {
        $data_control = mysqli_fetch_assoc($res_control);
        // Check if $data1 is not null before accessing array offset
        if ($data_control !== null && isset($data_control['Value'])) {
            return $data_control['Value'];
        } else {
            return null; // or any default value you want to return in case of no data
        }
    } else {
        return null; // or handle the query error in some way
    }
}
$isNewBorderTrue = fetchValues(1);
$isNewMessRecieptTrue = fetchValues(2);
$month_value= fetchValues(3);

//Getting the month
switch ($month_value) {
    case 1:
        $month_name = "January";
        break;
    case 2:
        $month_name = "February";
        break;
    case 3:
        $month_name = "March";
        break;
    case 4:
        $month_name = "April";
        break;
    case 5:
        $month_name = "May";
        break;
    case 6:
        $month_name = "June";
        break;
    case 7:
        $month_name = "July";
        break;
    case 8:
        $month_name = "August";
        break;
    case 9:
        $month_name = "September";
        break;
    case 10:
        $month_name = "October";
        break;
    case 11:
        $month_name = "November";
        break;
    case 12:
        $month_name = "December";
        break;
    default:
        $month_name = "Invalid Month";
        break;
}
$year = fetchValues(4);

?>
