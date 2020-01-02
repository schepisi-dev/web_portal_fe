<?php
$url = 'http://10.128.187.11';
$token = $_POST['token'];
$json = file_get_contents($url.'/web/web_portal_be/reports/accounts/year?token='.$token); 
$data = json_decode($json, true);

// Convert JSON string to Array
  print_r($data);        // Dump all data of the Array
  echo $data[0]['data']; // Access Array data
  foreach($data as $val){
  	echo $val['month'];
  	$dataKey = $val['data'];
  	foreach($dataKey as $d){
  		echo $d['call_and_usage'];
  	}
  }
?>