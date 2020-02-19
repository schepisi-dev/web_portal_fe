<?php
$token = $_POST['token'];
$url = $_POST['url'];
$json = file_get_contents($url.'/api/organization?token='.$token); 
$data = json_decode($json,true);
	
$totalCount = 0;
// change the variable name to org which is clearer.
$baseURL = "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

$org = $data['message'];
foreach ($org as $organization)
{
		echo '<tr class="tr-shadow">
		 
		    <td id="orgName">'.$organization['organization_name'].'</td>
		    <td id="createdDate">'.$organization['organization_created_on'].'</td>
		    <td id="action">
	            <div class="table-data__info table-data-feature">
	            <div class="col-md-6"><button type="button" class="btn btn-primary btn-block" id="editOrganization" rel="'.$organization['organization_id'].'" onclick=editOrg("'.$organization['organization_id'].'"); data-toggle="modal" data-target="#editOrg">Edit</button></div>
	            <div class="col-md-6"><button type="button" class="btn btn-primary btn-block" id="archiveOrganization" rel="'.$organization['organization_id'].'" onclick=archiveOrg("'.$organization['organization_id'].'");>Archive</button></div>';
	            
	            
	           echo ' 
            </div></td>
		</tr>';

}
?>