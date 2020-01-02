<?php 
$url = 'http://10.128.187.11';
$token = $_POST['token'];
$type = $_POST['type'];
$json = file_get_contents($url.'/web/web_portal_be/api/file_histories/'.$type.'?token='.$token);
//$json = file_get_contents($url.'/web/web_portal_be/api/transaction?token='.$token.'&type='.$type); 
$data = json_decode($json,true);
$devices = $data['message'];
foreach ($devices as $device)
{
	if($type == 'chargers_and_credit'){
		echo '<tr><td>'.$device['info']['first_id'].'</td>';
		echo '<td>'.$device['uploaded_by'].'</td>';
		echo '<td>'.$device['info']['date_uploaded'].'</td></tr>';
			
	}
	else if($type == 'call_and_usage'){
		echo '<tr><td>'.$device['info']['first_id'].'</td>';
		echo '<td>'.$device['uploaded_by'].'</td>';
		echo '<td>'.$device['info']['date_uploaded'].'</td></tr>';
	}
	else if($type == 'service_and_equipment'){
		echo '<tr><td>'.$device['info']['first_id'].'</td>';
		echo '<td>'.$device['uploaded_by'].'</td>';
		echo '<td>'.$device['info']['date_uploaded'].'</td></tr>';
	}	
}

?>
