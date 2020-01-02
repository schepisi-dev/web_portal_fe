<?php
$url = 'http://10.128.187.11';
$token = $_POST['token'];
$json = file_get_contents($url.'/web/web_portal_be/api/organization/?token='.$token); 
$data = json_decode($json,true);
$URL = $_POST['url'];
$totalCount = 0;
// change the variable name to devices which is clearer.
$devices = $data['message'];
foreach ($devices as $device)
{
	if ($URL=='/schepisi/organization.php'){
		echo '<tr class="tr-shadow">
		    <td>
		        <label class="au-checkbox">
		            <input type="checkbox">
		            <span class="au-chec ark"></span>
		        </label>
		    </td>
		    <td id="orgName">'.$device['organization_name'].'</td>
		    <td>
		        <span class="block-email"></span>
		    </td>
		    <td class="desc"></td>
		    <td></td>
		    <td>
		        <span class="status--process"></span>
		    </td>
		    <td></td>
		    <td>
		        <div class="table-data-feature">
		            <button class="item" data-toggle="tooltip" data-placement="top" title="Send">
		                <i class="zmdi zmdi-mail-send"></i>
		            </button>
		            <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
		                <i class="zmdi zmdi-edit"></i>
		            </button>
		            <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
		                <i class="zmdi zmdi-delete"></i>
		            </button>
		        </div>
		    </td>
		</tr>';

	}
	else if($URL == '/schepisi/users.php' || $URL == '/schepisi/upload.php'){
		echo '<option value='.$device['organization_id'].' id='.$device['organization_id'].'>'.$device['organization_name'].'</option>';
	}
	else{
		if($device['organization_name']){
			$totalCount = $totalCount+1;

		}
	}

}
echo $totalCount;
?>