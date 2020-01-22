<?php
include 'config.php';
$token = $_POST['token'];
$json = file_get_contents($url.'/api/cost_centre?token='.$token); 
$data = json_decode($json,true);
$devices = $data['message'];

foreach ($devices as $device)
{
	$costCentreName = $device['cost_centre_name'];
	$costCentreParentID = $device['cost_centre_parent_id'];
    $costCentreID = $device['cost_centre_id'];
    //$costCentreChild = $device['cost_centre_children'];
    echo '<li id='.$costCentreID.'><span class="caret">'.$costCentreName.'</span><ul class="nested">';

        if(is_array($device['cost_centre_children'])){
            foreach($device['cost_centre_children'] as $firstChild){
                echo '<li><span class="caret">'.$firstChild['cost_centre_name'].'</span><ul class="nested">';
                if(is_array($firstChild['cost_centre_children'])){
                    foreach($firstChild['cost_centre_children'] as $secondChild){
                       echo '<li><span class="caret">'.$secondChild['cost_centre_name'].'</li>'; 
                   } 
                   echo '</ul></li>';                   
                }
            }
        }

    echo '</ul></li>';


}


?>