<?php
$url = 'http://10.128.187.11';
$token = $_POST['token'];
$json = file_get_contents($url.'/web/web_portal_be/reports/cost_centres/get/3/'. date('Y').'/3/?token='.$token); 
$data = json_decode($json,true);
$devices = $data['account_numbers'];
echo $devices;
/*foreach($devices as $v){
    echo "[".$v[0].",".$v[1].",".$v[2].",".$v[3]."]";    
}*/

?>