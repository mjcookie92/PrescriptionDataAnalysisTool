<?php

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'root';

$port = 8889;

$conn = mysql_connect($dbhost, $dbuser, $dbpass) ;
$dbname = 'PrescriptionReporting';
mysql_select_db($dbname);

if (!$conn) {echo "<p>ConnectionFailed</p>";} 


$options = '';
$filter=mysql_query("select distinct BNFName from JanData order by BNFName");
while($row = mysql_fetch_array($filter)) {
    $options .="<option>" . $row['BNFName'] . "</option>";
}

$menu="<form id='Drug' name='Drug' method='post' action=''>
  <p><label>Drugs</label></p>
    <select name='Drug' id='Drug'>
      " . $options . "
    </select>
</form>";

echo $menu;

?>


