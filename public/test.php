<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('max_execution_time', 0);
/*echo phpversion("mongo"), "\n";
$username = 'xmasfo3';
$password = 'IhecjyLEij8Q7UH9DIdg';
$host = '203.162.56.82:30000';
$database = 'admin';
$client = new MongoClient("mongodb://$username:$password@$host", ['socketTimeoutMS' => 10000000]);

$db = $client->log_20161118;

$collection = $db->cslogs;

// search for fruits
//$fruitQuery = array('_id' => '582de210233176156970d413');

$cursor = $collection->count(array('type' => 501, 'opts.forf' => 0));

die($cursor);*/


$url = 'http://121.201.116.239:888/sales/ecard/gop/func.aspx';

$myvars = 'event=app_info&id=261804103&type=Garena';

$ch = curl_init( $url );
curl_setopt( $ch, CURLOPT_POST, 1);
curl_setopt( $ch, CURLOPT_POSTFIELDS, $myvars);
curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt( $ch, CURLOPT_HEADER, 0);
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);

$response = curl_exec( $ch );

print_r($response);