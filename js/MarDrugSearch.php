<?php

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'root';

$port = 8889;

$conn = mysql_connect($dbhost, $dbuser, $dbpass) ;
$dbname = 'PrescriptionReporting';
mysql_select_db($dbname);

if (!$conn) {echo "<p>ConnectionFailed</p>";} 


$selected_val1 = $_POST['drugsearch']; // Storing Selected Value In Variable

$querystring = "select SUM(Items) Items,
case when (postcode like 'BB%') then 'North West' 
when (postcode like 'BL%') then 'North West'
when (postcode like 'CA%') then 'North West'
when (postcode like 'CH%') then 'North West'
when (postcode like 'CW%') then 'North West'
when (postcode like 'FY%') then 'North West'
when (postcode like 'L1%') then 'North West'
when (postcode like 'L2%') then 'North West'
when (postcode like 'L3%') then 'North West'
when (postcode like 'L4%') then 'North West'
when (postcode like 'L5%') then 'North West'
when (postcode like 'L6%') then 'North West'
when (postcode like 'L7%') then 'North West'
when (postcode like 'L8%') then 'North West'
when (postcode like 'L9%') then 'North West'
when (postcode like 'LA%') then 'North West'
when (postcode like 'M1%') then 'North West'
when (postcode like 'M2%') then 'North West'
when (postcode like 'M3%') then 'North West'
when (postcode like 'M4%') then 'North West'
when (postcode like 'M5%') then 'North West'
when (postcode like 'M6%') then 'North West'
when (postcode like 'M7%') then 'North West'
when (postcode like 'M8%') then 'North West'
when (postcode like 'M9%') then 'North West'
when (postcode like 'OL%') then 'North West'
when (postcode like 'PR%') then 'North West'
when (postcode like 'SK%') then 'North West'
when (postcode like 'WA%') then 'North West'
when (postcode like 'WN%') then 'North West'


when (postcode like 'DH%') then 'North East'
when (postcode like 'DL%') then 'North East'
when (postcode like 'NE%') then 'North East'
when (postcode like 'SR%') then 'North East'
when (postcode like 'TD%') then 'North East'
when (postcode like 'TS%') then 'North East'

when (postcode like 'BN%') then 'South East'
when (postcode like 'BR%') then 'South East'
when (postcode like 'CR%') then 'South East'
when (postcode like 'CT%') then 'South East'
when (postcode like 'DA%') then 'South East'
when (postcode like 'GU%') then 'South East'
when (postcode like 'HP%') then 'South East'
when (postcode like 'KT%') then 'South East'
when (postcode like 'ME%') then 'South East'
when (postcode like 'MK%') then 'South East'
when (postcode like 'OX%') then 'South East'
when (postcode like 'PO%') then 'South East'
when (postcode like 'RG%') then 'South East'
when (postcode like 'RH%') then 'South East'
when (postcode like 'SL%') then 'South East'
when (postcode like 'SM%') then 'South East'
when (postcode like 'SO%') then 'South East'
when (postcode like 'TN%') then 'South East'
when (postcode like 'TW%') then 'South East'
when (postcode like 'UB%') then 'South East'
when (postcode like 'WD%') then 'South East'

when (postcode like 'BA%') then 'South West'
when (postcode like 'BH%') then 'South West'
when (postcode like 'BS%') then 'South West'
when (postcode like 'DT%') then 'South West'
when (postcode like 'EX%') then 'South West'
when (postcode like 'GL%') then 'South West'
when (postcode like 'NP%') then 'South West'
when (postcode like 'PL%') then 'South West'
when (postcode like 'SN%') then 'South West'
when (postcode like 'SP%') then 'South West'
when (postcode like 'TA%') then 'South West'
when (postcode like 'TW%') then 'South West'
when (postcode like 'TR%') then 'South West'
when (postcode like 'TQ%') then 'South West'


when (postcode like 'B1%') then 'West Midlands' 
when (postcode like 'B2%') then 'West Midlands' 
when (postcode like 'B3%') then 'West Midlands' 
when (postcode like 'B4%') then 'West Midlands' 
when (postcode like 'B5%') then 'West Midlands' 
when (postcode like 'B6%') then 'West Midlands' 
when (postcode like 'B7%') then 'West Midlands' 
when (postcode like 'B8%') then 'West Midlands' 
when (postcode like 'B9%') then 'West Midlands' 
when (postcode like 'CV%') then 'West Midlands' 
when (postcode like 'DY%') then 'West Midlands' 
when (postcode like 'HR%') then 'West Midlands' 
when (postcode like 'LD%') then 'West Midlands'
when (postcode like 'NP%') then 'West Midlands' 
when (postcode like 'ST%') then 'West Midlands' 
when (postcode like 'SY%') then 'West Midlands' 
when (postcode like 'TF%') then 'West Midlands'  
when (postcode like 'WR%') then 'West Midlands' 
when (postcode like 'WS%') then 'West Midlands' 
when (postcode like 'WV%') then 'West Midlands' 

when (postcode like 'DE%') then 'East Midlands'
when (postcode like 'DN%') then 'East Midlands' 
when (postcode like 'LE%') then 'East Midlands' 
when (postcode like 'LN%') then 'East Midlands' 
when (postcode like 'NG%') then 'East Midlands'  
when (postcode like 'NN%') then 'East Midlands' 
when (postcode like 'PE%') then 'East Midlands' 
when (postcode like 'SK%') then 'East Midlands' 
when (postcode like 'S1%') then 'East Midlands' 
when (postcode like 'S2%') then 'East Midlands'
when (postcode like 'S3%') then 'East Midlands'
when (postcode like 'S4%') then 'East Midlands'
when (postcode like 'S5%') then 'East Midlands' 
when (postcode like 'S6%') then 'East Midlands' 
when (postcode like 'S7%') then 'East Midlands'
when (postcode like 'S8%') then 'East Midlands' 
when (postcode like 'S9%') then 'East Midlands'

when (postcode like 'BD%') then 'Yorkshire'
when (postcode like 'DL%') then 'Yorkshire'
when (postcode like 'DN%') then 'Yorkshire'
when (postcode like 'HD%') then 'Yorkshire'
when (postcode like 'HG%') then 'Yorkshire'
when (postcode like 'HU%') then 'Yorkshire'
when (postcode like 'HX%') then 'Yorkshire'
when (postcode like 'LS%') then 'Yorkshire'
when (postcode like 'WF%') then 'Yorkshire'
when (postcode like 'YO%') then 'Yorkshire'
when (postcode like 'S1%') then 'Yorkshire'
when (postcode like 'S2%') then 'Yorkshire'
when (postcode like 'S3%') then 'Yorkshire'
when (postcode like 'S4%') then 'Yorkshire'
when (postcode like 'S5%') then 'Yorkshire'
when (postcode like 'S6%') then 'Yorkshire'
when (postcode like 'S7%') then 'Yorkshire'
when (postcode like 'S8%') then 'Yorkshire'
when (postcode like 'S9%') then 'Yorkshire'

when (postcode like 'EC%') then 'London'
when (postcode like 'WC%') then 'London'
when (postcode like 'E1%') then 'London'
when (postcode like 'E2%') then 'London'
when (postcode like 'E3%') then 'London'
when (postcode like 'E4%') then 'London'
when (postcode like 'E5%') then 'London'
when (postcode like 'E6%') then 'London'
when (postcode like 'E7%') then 'London'
when (postcode like 'E8%') then 'London'
when (postcode like 'E9%') then 'London'
when (postcode like 'N1%') then 'London'
when (postcode like 'N2%') then 'London'
when (postcode like 'N3%') then 'London'
when (postcode like 'N4%') then 'London'
when (postcode like 'N5%') then 'London'
when (postcode like 'N6%') then 'London'
when (postcode like 'N7%') then 'London'
when (postcode like 'N8%') then 'London'
when (postcode like 'N9%') then 'London'
when (postcode like 'NW%') then 'London'
when (postcode like 'SE%') then 'London'
when (postcode like 'SW%') then 'London'
when (postcode like 'W1%') then 'London'
when (postcode like 'W2%') then 'London'
when (postcode like 'W3%') then 'London'
when (postcode like 'W4%') then 'London'
when (postcode like 'W5%') then 'London'
when (postcode like 'W6%') then 'London'
when (postcode like 'W7%') then 'London'
when (postcode like 'W8%') then 'London'
when (postcode like 'W9%') then 'London'
when (postcode like 'EN%') then 'London'
when (postcode like 'HA%') then 'London'
when (postcode like 'IG%') then 'London'
when (postcode like 'RM%') then 'London'
when (postcode like 'WC%') then 'London'

when (postcode like 'AL%') then 'East of England'
when (postcode like 'CB%') then 'East of England'
when (postcode like 'CM%') then 'East of England'
when (postcode like 'IP%') then 'East of England'
when (postcode like 'LU%') then 'East of England'
when (postcode like 'NR%') then 'East of England'
when (postcode like 'SG%') then 'East of England'
when (postcode like 'SS%') then 'East of England'
when (postcode like 'CO%') then 'East of England'


else 'error'  end as region

from MarData
inner join PracticeAddresses on MarData.Practice = PracticeAddresses.Practice
 

where 
BNFName = ('".$selected_val1."')

group by BNFName, (case when (postcode like 'BB%') then 'North West' 
when (postcode like 'BL%') then 'North West'
when (postcode like 'CA%') then 'North West'
when (postcode like 'CH%') then 'North West'
when (postcode like 'CW%') then 'North West'
when (postcode like 'FY%') then 'North West'
when (postcode like 'L1%') then 'North West'
when (postcode like 'L2%') then 'North West'
when (postcode like 'L3%') then 'North West'
when (postcode like 'L4%') then 'North West'
when (postcode like 'L5%') then 'North West'
when (postcode like 'L6%') then 'North West'
when (postcode like 'L7%') then 'North West'
when (postcode like 'L8%') then 'North West'
when (postcode like 'L9%') then 'North West'
when (postcode like 'LA%') then 'North West'
when (postcode like 'M1%') then 'North West'
when (postcode like 'M2%') then 'North West'
when (postcode like 'M3%') then 'North West'
when (postcode like 'M4%') then 'North West'
when (postcode like 'M5%') then 'North West'
when (postcode like 'M6%') then 'North West'
when (postcode like 'M7%') then 'North West'
when (postcode like 'M8%') then 'North West'
when (postcode like 'M9%') then 'North West'
when (postcode like 'OL%') then 'North West'
when (postcode like 'PR%') then 'North West'
when (postcode like 'SK%') then 'North West'
when (postcode like 'WA%') then 'North West'
when (postcode like 'WN%') then 'North West'


when (postcode like 'DH%') then 'North East'
when (postcode like 'DL%') then 'North East'
when (postcode like 'NE%') then 'North East'
when (postcode like 'SR%') then 'North East'
when (postcode like 'TD%') then 'North East'
when (postcode like 'TS%') then 'North East'

when (postcode like 'BN%') then 'South East'
when (postcode like 'BR%') then 'South East'
when (postcode like 'CR%') then 'South East'
when (postcode like 'CT%') then 'South East'
when (postcode like 'DA%') then 'South East'
when (postcode like 'GU%') then 'South East'
when (postcode like 'HP%') then 'South East'
when (postcode like 'KT%') then 'South East'
when (postcode like 'ME%') then 'South East'
when (postcode like 'MK%') then 'South East'
when (postcode like 'OX%') then 'South East'
when (postcode like 'PO%') then 'South East'
when (postcode like 'RG%') then 'South East'
when (postcode like 'RH%') then 'South East'
when (postcode like 'SL%') then 'South East'
when (postcode like 'SM%') then 'South East'
when (postcode like 'SO%') then 'South East'
when (postcode like 'TN%') then 'South East'
when (postcode like 'TW%') then 'South East'
when (postcode like 'UB%') then 'South East'
when (postcode like 'WD%') then 'South East'

when (postcode like 'BA%') then 'South West'
when (postcode like 'BH%') then 'South West'
when (postcode like 'BS%') then 'South West'
when (postcode like 'DT%') then 'South West'
when (postcode like 'EX%') then 'South West'
when (postcode like 'GL%') then 'South West'
when (postcode like 'NP%') then 'South West'
when (postcode like 'PL%') then 'South West'
when (postcode like 'SN%') then 'South West'
when (postcode like 'SP%') then 'South West'
when (postcode like 'TA%') then 'South West'
when (postcode like 'TW%') then 'South West'
when (postcode like 'TR%') then 'South West'
when (postcode like 'TQ%') then 'South West'


when (postcode like 'B1%') then 'West Midlands' 
when (postcode like 'B2%') then 'West Midlands' 
when (postcode like 'B3%') then 'West Midlands' 
when (postcode like 'B4%') then 'West Midlands' 
when (postcode like 'B5%') then 'West Midlands' 
when (postcode like 'B6%') then 'West Midlands' 
when (postcode like 'B7%') then 'West Midlands' 
when (postcode like 'B8%') then 'West Midlands' 
when (postcode like 'B9%') then 'West Midlands' 
when (postcode like 'CV%') then 'West Midlands' 
when (postcode like 'DY%') then 'West Midlands' 
when (postcode like 'HR%') then 'West Midlands' 
when (postcode like 'LD%') then 'West Midlands'
when (postcode like 'NP%') then 'West Midlands' 
when (postcode like 'ST%') then 'West Midlands' 
when (postcode like 'SY%') then 'West Midlands' 
when (postcode like 'TF%') then 'West Midlands'  
when (postcode like 'WR%') then 'West Midlands' 
when (postcode like 'WS%') then 'West Midlands' 
when (postcode like 'WV%') then 'West Midlands' 

when (postcode like 'DE%') then 'East Midlands'
when (postcode like 'DN%') then 'East Midlands' 
when (postcode like 'LE%') then 'East Midlands' 
when (postcode like 'LN%') then 'East Midlands' 
when (postcode like 'NG%') then 'East Midlands'  
when (postcode like 'NN%') then 'East Midlands' 
when (postcode like 'PE%') then 'East Midlands' 
when (postcode like 'SK%') then 'East Midlands' 
when (postcode like 'S1%') then 'East Midlands' 
when (postcode like 'S2%') then 'East Midlands'
when (postcode like 'S3%') then 'East Midlands'
when (postcode like 'S4%') then 'East Midlands'
when (postcode like 'S5%') then 'East Midlands' 
when (postcode like 'S6%') then 'East Midlands' 
when (postcode like 'S7%') then 'East Midlands'
when (postcode like 'S8%') then 'East Midlands' 
when (postcode like 'S9%') then 'East Midlands'

when (postcode like 'BD%') then 'Yorkshire'
when (postcode like 'DL%') then 'Yorkshire'
when (postcode like 'DN%') then 'Yorkshire'
when (postcode like 'HD%') then 'Yorkshire'
when (postcode like 'HG%') then 'Yorkshire'
when (postcode like 'HU%') then 'Yorkshire'
when (postcode like 'HX%') then 'Yorkshire'
when (postcode like 'LS%') then 'Yorkshire'
when (postcode like 'WF%') then 'Yorkshire'
when (postcode like 'YO%') then 'Yorkshire'
when (postcode like 'S1%') then 'Yorkshire'
when (postcode like 'S2%') then 'Yorkshire'
when (postcode like 'S3%') then 'Yorkshire'
when (postcode like 'S4%') then 'Yorkshire'
when (postcode like 'S5%') then 'Yorkshire'
when (postcode like 'S6%') then 'Yorkshire'
when (postcode like 'S7%') then 'Yorkshire'
when (postcode like 'S8%') then 'Yorkshire'
when (postcode like 'S9%') then 'Yorkshire'

when (postcode like 'EC%') then 'London'
when (postcode like 'WC%') then 'London'
when (postcode like 'E1%') then 'London'
when (postcode like 'E2%') then 'London'
when (postcode like 'E3%') then 'London'
when (postcode like 'E4%') then 'London'
when (postcode like 'E5%') then 'London'
when (postcode like 'E6%') then 'London'
when (postcode like 'E7%') then 'London'
when (postcode like 'E8%') then 'London'
when (postcode like 'E9%') then 'London'
when (postcode like 'N1%') then 'London'
when (postcode like 'N2%') then 'London'
when (postcode like 'N3%') then 'London'
when (postcode like 'N4%') then 'London'
when (postcode like 'N5%') then 'London'
when (postcode like 'N6%') then 'London'
when (postcode like 'N7%') then 'London'
when (postcode like 'N8%') then 'London'
when (postcode like 'N9%') then 'London'
when (postcode like 'NW%') then 'London'
when (postcode like 'SE%') then 'London'
when (postcode like 'SW%') then 'London'
when (postcode like 'W1%') then 'London'
when (postcode like 'W2%') then 'London'
when (postcode like 'W3%') then 'London'
when (postcode like 'W4%') then 'London'
when (postcode like 'W5%') then 'London'
when (postcode like 'W6%') then 'London'
when (postcode like 'W7%') then 'London'
when (postcode like 'W8%') then 'London'
when (postcode like 'W9%') then 'London'
when (postcode like 'EN%') then 'London'
when (postcode like 'HA%') then 'London'
when (postcode like 'IG%') then 'London'
when (postcode like 'RM%') then 'London'
when (postcode like 'WC%') then 'London'

when (postcode like 'AL%') then 'East of England'
when (postcode like 'CB%') then 'East of England'
when (postcode like 'CM%') then 'East of England'
when (postcode like 'IP%') then 'East of England'
when (postcode like 'LU%') then 'East of England'
when (postcode like 'NR%') then 'East of England'
when (postcode like 'SG%') then 'East of England'
when (postcode like 'SS%') then 'East of England'
when (postcode like 'CO%') then 'East of England'


else 'error' end)

order by SUM(Items) Desc;";

$result = mysql_query($querystring);

$prefix = '' ;
echo "[\n";
while($row = mysql_fetch_array($result)) {
echo $prefix ."{\n";
echo ' "Items": "' . $row['Items'] . '",' . "\n";
echo ' "region": "' . $row['region'] . '"' . "\n";
echo " }";
$prefix = ",\n";
}
echo "\n]";



?>
