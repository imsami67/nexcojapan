<?php 	

  // $username = "nexcojap_website";
  // $password = "nexcojap_website";
  // $dbname = "nexcojap_website";
$localhost = "localhost";
 $username = "samziymw_nexcojapan";
 $password = "samziymw_nexcojapan";
 $dbname = "samziymw_nexcojapan";

$connect = new mysqli($localhost, $username, $password, $dbname);
$dbc =  mysqli_connect($localhost, $username, $password, $dbname);
@session_start();
if($connect->connect_error) {
  die("Connection Failed : " . $connect->connect_error);
} else {
  //echo "Done";
}

?>