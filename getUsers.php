<?php
$url = 'http://10.128.187.11';
$token = $_POST['token'];
$json = file_get_contents($url.'/web/web_portal_be/api/user?offset=0&limit=0&token='.$token); 
$data = json_decode($json,true);
$URL = $_POST['url'];
$totalUserCount = 0;

$devices = $data['message'];
foreach ($devices as $device)
{

	if($URL !='/schepisi/users.php'){
		if($device['user_organization_name']){
			$totalUserCount = $totalUserCount+1;
		}
		
	}
	else{
		$legend = $device['user_role'];

		if($legend == 'standard'){
			$color = 'user';
		}
		elseif($legend == 'basic'){
			$color = 'member';
		}
		elseif($legend == 'administrator'){
			$color = 'admin';
		}
		else{
			return;
		}
	echo '
			<tr>
                <td>
                    <div class="table-data__info">
                        <h6>'.$device['user_first_name'].' , '.$device['user_last_name'].'</h6>
                    </div>
                </td>
                <td>
                    <h6>'.$device['user_email'].'</h6>
                </td>
                <td id="userOrg">
                    <div class="table-data__info">
                        <h6>'.$device['user_organization_name'].'</h6>
                    </div>
                </td>
                <td id="userName">
                    <div class="table-data__info">
                        <h6>'.$device['user_username'].'</h6>
                    </div>
                </td>
                <td>
                    <div class="table-data__info">
                    	<span class="role '.$color.'">'.$device['user_role'].'</span>
                    </div>
                </td>
            </tr>
		';
	}
}
echo $totalUserCount;
?>