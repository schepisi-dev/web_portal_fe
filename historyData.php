<?php 
include 'config.php';
$token = $_POST['token'];
$json = file_get_contents($url.'/api/file_histories?token='.$token);
//$json = file_get_contents($url.'/web/web_portal_be/api/transaction?token='.$token.'&type='.$type); 
$data = json_decode($json,true);
$history = $data['message'];
foreach ($history as $uploadHistory)
{
		echo '<tr><td>'.$uploadHistory['id'].'</td>';
		echo '<td>'.$uploadHistory['type'].'</td>';
		echo '<td><a href="#" data-toggle="modal" data-target="#historyModal">'.$uploadHistory['uploaded_by'].'</a></td>';
		echo '<td>'.$uploadHistory['date_uploaded'].'</td></tr>';
}

?>
