<?php
$con = mysqli_connect('localhost', 'root', '', 'u435326493_nonbrokerage');

if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
} else {
  // echo "Connected Successfully";
}
$base_url = "#";

date_default_timezone_set("Asia/Kolkata");

$str = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
$urltoken = substr(str_shuffle($str), 0, 40);


$token = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz'.round(microtime(true));
$userTok = substr(str_shuffle($str), 0, 24);

$nameKey  = '1234567890'.round(microtime(true));
$nameKeyTok = substr(str_shuffle($nameKey), 0, 5);

?>
