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
		echo '<td><a href="#" id="btn-history">'.$uploadHistory['uploaded_by'].'</a><div class = "historyInfo"><h5>File Upload Information</h5><span>First ID: </span>'.$uploadHistory['info']['first_id'].'<br><span>Last ID:</span> '.$uploadHistory['info']['last_id'].'<br><span>Upload Type: </span>'.$uploadHistory['info']['date_uploaded'].'<br><span>Date Uploaded: </span>'.$uploadHistory['info']['date_uploaded'].'</div></td>';
		echo '<td>'.$uploadHistory['date_uploaded'].'</td></tr>';
}

?>
