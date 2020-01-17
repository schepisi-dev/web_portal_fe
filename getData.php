<?php
$url = 'http://10.128.187.11';
$token = $_POST['token'];
$json = file_get_contents($url.'/web/web_portal_be/api/organization/?token='.$token); 
$data = json_decode($json,true);
$URL = $_POST['url'];
$totalCount = 0;
// change the variable name to org which is clearer.
$org = $data['message'];
foreach ($org as $organization)
{
	if ($URL=='/schepisi/organization.php'){
		echo '<tr class="tr-shadow">
		 
		    <td id="orgName">'.$organization['organization_name'].'</td>
		    <td id="createdDate">'.$organization['organization_created_on'].'</td>
		    <td id="action">
	            <div class="table-data__info table-data-feature">
	                <button type="button" class="btn btn-primary btn-block" id="editOrganization">Edit</button>
	            </div>
            </td>
		</tr>';

	}
	else if($URL == '/schepisi/users.php' || $URL == '/schepisi/upload.php'){
		echo '<option value='.$organization['organization_id'].' id='.$organization['organization_id'].'>'.$organization['organization_name'].'</option>';
	}
	else{
		if($organization['organization_name']){
			$totalCount = $totalCount+1;

		}
	}

}
?>