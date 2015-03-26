<?php

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'root';

$port = 8889;

$conn = mysql_connect($dbhost, $dbuser, $dbpass) ;
$dbname = 'PrescriptionReporting';
mysql_select_db($dbname);

if (!$conn) {echo "<p>ConnectionFailed</p>";} 


$querystring = "select SUM(Items) Items,BNFName from MarData group by BNFName order by sum(Items) DESC limit 10 ;";

$result = mysql_query($querystring);

$prefix = '' ;
echo "[\n";
while($row = mysql_fetch_array($result)) {
echo $prefix ."{\n";
echo ' "Items": "' . $row['Items'] . '",' . "\n";
echo ' "BNFName": "' . $row['BNFName'] . '"' . "\n";
echo " }";
$prefix = ",\n";
}
echo "\n]";

?>