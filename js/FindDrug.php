
<?php

if ( !isset($_REQUEST['term']) )
    exit;

$dblink = mysql_connect('localhost', 'root', 'root') or die( mysql_error() );
mysql_select_db('PrescriptionReporting');

$rs = mysql_query('select distinct BNFName from JanData where BNFName LIKE "'.mysql_real_escape_string($_REQUEST['term']) .'% " order by BNFName ', $dblink);

$data = array();
if ( $rs && mysql_num_rows($rs) )
{
    while( $row = mysql_fetch_array($rs, MYSQL_ASSOC) )
    {
        $data[] = array(
            'label' => $row['BNFName'],
            'value' => $row['BNFName']
        );
    }
}

echo json_encode($data);
flush();

?>


