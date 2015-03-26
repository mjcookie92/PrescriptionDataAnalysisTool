<?php

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'root';

$port = 8889;

$conn = mysql_connect($dbhost, $dbuser, $dbpass) ;
$dbname = 'PrescriptionReporting';
mysql_select_db($dbname);

if (!$conn) {echo "<p>ConnectionFailed</p>";} 


$querystring = "select ROUND(SUM(ACTCost),2) ACTCost ,BNFName from FebData group by BNFName order by ROUND(SUM(ACTCost),2) DESC limit 10 ;";

$result = mysql_query($querystring);

$prefix = '' ;
echo "[\n";
while($row = mysql_fetch_array($result)) {
echo $prefix ."{\n";
echo ' "ACTCost": "' . $row['ACTCost'] . '",' . "\n";
echo ' "BNFName": "' . $row['BNFName'] . '"' . "\n";
echo " }";
$prefix = ",\n";
}
echo "\n]";





?>




