<?php
$url = 'http://10.128.187.11';
$token = $_POST['token'];
if(!isset($_POST['click'])){
	$_POST['click'] = '';
}
$json = file_get_contents($url.'/web/web_portal_be/reports/accounts/month?token='.$token); 
$data = json_decode($json,true);
$callAndUsageType = $data['call_and_usage'];
$chargersAndCreditType = $data['chargers_and_credit'];
$serviceAndEquipment = $data['service_and_equipment'];

if($click = $_POST['click']){
	
	if($click == 'usage active'){
		echo '<li><h4>Call & Usage</h4><ul class="list-unstyled navbar__sub-list js-sub-list">';
		foreach($callAndUsageType['types'] as $usage){
			echo "<li><h6>Billing Name: " . $usage['name']."</h6>";
			foreach($usage['accounts'] as $v){
				echo "<li><h6>Mobile Number: ".$v['number']."</h6>";
				echo "<h6>Total Cost: $".$v['total']."</h6>";
				echo "</li>";
			}
			echo "</li><br>";	
	
		}
		echo "</ul></li>";
	}
	else if($click == 'chargers active'){
		echo '<li><h4>Chargers and Credit</h4><ul class="list-unstyled navbar__sub-list js-sub-list">';
		foreach($chargersAndCreditType['types'] as $chargers){
			echo "<li><h6>Billing Name: " . $chargers['type']."</h6>";
			foreach($chargers['accounts'] as $v){
				echo "<li><h6>Account Number: ".$v['account_number']."</h6>";
				echo "<h6>Total Cost: $".$v['total']."</h6>";
				echo "</li>";
			}
			echo "</li><br>";	
		}
		echo "</ul></li>";
	}
	else if($click == 'service active'){
		echo '<li><h4>Service & Equipment</h4><ul class="list-unstyled navbar__sub-list js-sub-list">';
		foreach($serviceAndEquipment['types'] as $service){
			echo "<li><h6>Billing Name: " . $service['type']."</h6></li>";	
		}
		echo "</ul></li>";
	}
}
else{
	echo "<span id='callandusageTxt'>" .$callAndUsageType['total']."</span>";
	echo "<span id='chargersandcreditTxt'>" .$chargersAndCreditType['total']."</span>";
	echo "<span id='serviceandequipmentTxt'>" .$serviceAndEquipment['total']."</span>";
}

?>