<?php

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'root';

$port = 8889;

$conn = mysql_connect($dbhost, $dbuser, $dbpass) ;
$dbname = 'PrescriptionReporting';
mysql_select_db($dbname);

if (!$conn) {echo "<p>ConnectionFailed</p>";} 

if(isset($_POST['submit'])){
$selected_val = $_POST['dropdown1']; // Storing Selected Value In Variable

$querystring = "select ROUND(SUM(ACTCost),2) ACTCost ,BNFName

from FebData
inner join PracticeAddresses on FebData.practice = PracticeAddresses.Practice

where
((case  
when (postcode like 'AL%') then 'St Albans' 
when (postcode like 'B1%') then 'Birmingham' 
when (postcode like 'B2%') then 'Birmingham'
when (postcode like 'B3%') then 'Birmingham'
when (postcode like 'B4%') then 'Birmingham'
when (postcode like 'B5%') then 'Birmingham'
when (postcode like 'B6%') then 'Birmingham'
when (postcode like 'B7%') then 'Birmingham'
when (postcode like 'B8%') then 'Birmingham'
when (postcode like 'B9%') then 'Birmingham'
when (postcode like 'BA%') then 'Bath'
when (postcode like 'BB%') then 'Blackburn' 
when (postcode like 'BD%') then 'Bradford'  
when (postcode like 'BH%') then 'Bournemouth' 
when (postcode like 'BL%') then 'Bolton' 
when (postcode like 'BN%') then 'Brighton' 
when (postcode like 'BR%') then 'Bromley' 
when (postcode like 'BS%') then 'Bristol' 
when (postcode like 'CA%') then 'Carlisle'  
when (postcode like 'CB%') then 'Cambridge' 
when (postcode like 'CH%') then 'Chester' 
when (postcode like 'CM%') then 'Chelmsford' 
when (postcode like 'CO%') then 'Colchester'
when (postcode like 'CR%') then 'Croydon' 
when (postcode like 'CT%') then 'Canterbury'  
when (postcode like 'CV%') then 'Coventry' 
when (postcode like 'CW%') then 'Crewe' 
when (postcode like 'DA%') then 'Dartford'  
when (postcode like 'DE%') then 'Derby'
when (postcode like 'DH%') then 'Durham' 
when (postcode like 'DL%') then 'Darlington' 
when (postcode like 'DN%') then 'Doncaster'
when (postcode like 'DT%') then 'Dorchester' 
when (postcode like 'DY%') then 'Dudley'  
when (postcode like 'EC%') then 'East London' 
when (postcode like 'EN%') then 'Enfield' 
when (postcode like 'E1%') then 'London'
when (postcode like 'E2%') then 'London'
when (postcode like 'E3%') then 'London'
when (postcode like 'E4%') then 'London'
when (postcode like 'E5%') then 'London'
when (postcode like 'E6%') then 'London'
when (postcode like 'E7%') then 'London'
when (postcode like 'E8%') then 'London'
when (postcode like 'E9%') then 'London'
when (postcode like 'EX%') then 'Exeter' 
when (postcode like 'FY%') then 'Blackpool' 
when (postcode like 'GL%') then 'Gloucester' 
when (postcode like 'GU%') then 'Guildford'
when (postcode like 'HA%') then 'Harrow' 
when (postcode like 'HD%') then 'Huddersfield' 
when (postcode like 'HG%') then 'Harrogate'
when (postcode like 'HP%') then 'Hemel Hempstead' 
when (postcode like 'HR%') then 'Hereford'   
when (postcode like 'HU%') then 'Hull' 
when (postcode like 'HX%') then 'Halifax' 
when (postcode like 'IG%') then 'Ilford' 
when (postcode like 'IP%') then 'Ipswich'
when (postcode like 'KT%') then 'Kingston upon Thames' 
when (postcode like 'L1%') then 'Liverpool'
when (postcode like 'L2%') then 'Liverpool'
when (postcode like 'L3%') then 'Liverpool'
when (postcode like 'L4%') then 'Liverpool'
when (postcode like 'L5%') then 'Liverpool'
when (postcode like 'L6%') then 'Liverpool'
when (postcode like 'L7%') then 'Liverpool'
when (postcode like 'L8%') then 'Liverpool'
when (postcode like 'L9%') then 'Liverpool'
when (postcode like 'LA%') then 'Lancaster' 
when (postcode like 'LD%') then 'Llandrindod Wells'  
when (postcode like 'LE%') then 'Leicester' 
when (postcode like 'LN%') then 'Lincoln' 
when (postcode like 'LS%') then 'Leeds' 
when (postcode like 'LU%') then 'Luton'
when (postcode like 'M1%') then 'Manchester'
when (postcode like 'M2%') then 'Manchester'
when (postcode like 'M3%') then 'Manchester'
when (postcode like 'M4%') then 'Manchester'
when (postcode like 'M5%') then 'Manchester'
when (postcode like 'M6%') then 'Manchester'
when (postcode like 'M7%') then 'Manchester'
when (postcode like 'M8%') then 'Manchester'
when (postcode like 'M9%') then 'Manchester' 
when (postcode like 'ME%') then 'Rochester'  
when (postcode like 'MK%') then 'Milton Keynes' 
when (postcode like 'N1%') then 'North London' 
when (postcode like 'N2%') then 'North London' 
when (postcode like 'N3%') then 'North London' 
when (postcode like 'N4%') then 'North London' 
when (postcode like 'N5%') then 'North London' 
when (postcode like 'N6%') then 'North London' 
when (postcode like 'N7%') then 'North London' 
when (postcode like 'N8%') then 'North London' 
when (postcode like 'N9%') then 'North London'  
when (postcode like 'NE%') then 'Newcastle upon Tyne' 
when (postcode like 'NG%') then 'Nottingham'
when (postcode like 'NN%') then 'Northampton'  
when (postcode like 'NR%') then 'Norwich' 
when (postcode like 'NW%') then 'North West London'
when (postcode like 'OL%') then 'Oldham' 
when (postcode like 'OX%') then 'Oxford'   
when (postcode like 'PE%') then 'Peterborough'  
when (postcode like 'PL%') then 'Plymouth' 
when (postcode like 'PO%') then 'Portsmouth'
when (postcode like 'PR%') then 'Preston' 
when (postcode like 'RG%') then 'Reading'  
when (postcode like 'RH%') then 'Redhill' 
when (postcode like 'RM%') then 'Romford'
when (postcode like 'S1%') then 'Sheffield' 
when (postcode like 'S2%') then 'Sheffield' 
when (postcode like 'S3%') then 'Sheffield' 
when (postcode like 'S4%') then 'Sheffield' 
when (postcode like 'S5%') then 'Sheffield' 
when (postcode like 'S6%') then 'Sheffield' 
when (postcode like 'S7%') then 'Sheffield' 
when (postcode like 'S8%') then 'Sheffield' 
when (postcode like 'S9%') then 'Sheffield'  
when (postcode like 'SE%') then 'South East London'
when (postcode like 'SG%') then 'Stevenage' 
when (postcode like 'SK%') then 'Stockport'  
when (postcode like 'SL%') then 'Slough' 
when (postcode like 'SM%') then 'Sutton'
when (postcode like 'SN%') then 'Swindon' 
when (postcode like 'SO%') then 'Southampton' 
when (postcode like 'SP%') then 'Salisbury Plain'
when (postcode like 'SR%') then 'Sunderland'
when (postcode like 'SS%') then 'Southend-on-Sea' 
when (postcode like 'ST%') then 'Stoke-on-Trent'  
when (postcode like 'SW%') then 'South West London' 
when (postcode like 'SY%') then 'Shrewsbury' 
when (postcode like 'TA%') then 'Taunton' 
when (postcode like 'TD%') then 'Tweeddale' 
when (postcode like 'TF%') then 'Telford'
when (postcode like 'TN%') then 'Tonbridge' 
when (postcode like 'TQ%') then 'Torquay'  
when (postcode like 'TR%') then 'Truro' 
when (postcode like 'TS%') then 'Teesside'
when (postcode like 'TW%') then 'Twickenham' 
when (postcode like 'UB%') then 'Uxbridge' 
when (postcode like 'W1%') then 'West London'
when (postcode like 'W2%') then 'West London'
when (postcode like 'W3%') then 'West London'
when (postcode like 'W4%') then 'West London'
when (postcode like 'W5%') then 'West London'
when (postcode like 'W6%') then 'West London'
when (postcode like 'W7%') then 'West London'
when (postcode like 'W8%') then 'West London'
when (postcode like 'W9%') then 'West London'
when (postcode like 'WA%') then 'Warrington' 
when (postcode like 'WC%') then 'Western Central London'  
when (postcode like 'WD%') then 'Watford' 
when (postcode like 'WF%') then 'Wakefield' 
when (postcode like 'WN%') then 'Wigan' 
when (postcode like 'WR%') then 'Worcester' 
when (postcode like 'WS%') then 'Walsall'
when (postcode like 'WV%') then 'Wolverhampton'  
when (postcode like 'YO%') then 'York' 
else 'Error'  end) = '$selected_val')

group by BNFName 
order by ROUND(SUM(ACTCost),2) DESC limit 10 ;";

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


}


?>
