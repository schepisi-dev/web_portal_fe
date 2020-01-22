<?php
include 'config.php';
$token = $_POST['token'];
$json = file_get_contents($url.'/api/user?offset=0&limit=0&token='.$token); 
$data = json_decode($json,true);
$URL = $_POST['url'];

$totalUserCount = 0;

$users = $data['message'];
foreach ($users as $user)
{

	if($URL !='/web_portal_fe/users.php'){
		if($user['user_organization_name']){
			$totalUserCount = $totalUserCount+1;
		}
		
	}
	else{
		$legend = $user['user_role'];

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
        if($_POST['role'] =='basic' || $_POST['role'] =='standard'){
            echo '<h5 class="'.$user['user_username'].'">Full Name: ' .$user['user_first_name'].' , '.$user['user_last_name']. "<br>";
            echo 'Username: ' .$user['user_username'] . "<br>";
            echo 'Email Address: ' .$user['user_email'] . "<br>";
            echo 'Organization: ' .$user['user_organization_name'] . "<br>";
            echo 'Role: ' .$user['user_role'] . " user<br>";
            echo 'Date Registered: ' .$user['user_date_created'] . "<br><br></h5>";
            
        }
        else{
            echo '
            <tr>
                <td>
                    <div class="table-data__info">
                        <h6>'.$user['user_first_name'].' , '.$user['user_last_name'].'</h6>
                    </div>
                </td>
                <td>
                    <h6>'.$user['user_email'].'</h6>
                </td>
                <td id="userOrg">
                    <div class="table-data__info">
                        <h6>'.$user['user_organization_name'].'</h6>
                    </div>
                </td>
                <td id="userName">
                    <div class="table-data__info">
                        <h6>'.$user['user_username'].'</h6>
                    </div>
                </td>
                <td>
                    <div class="table-data__info">
                        <span class="role '.$color.'">'.$user['user_role'].'</span>
                    </div>
                </td>
                <td>
                    <div class="table-data__info">
                        <h6>'.$user['user_date_created'].'</h6>
                    </div>
                </td>
                <td id="action">
                    <div class="table-data__info table-data-feature">
                        <button type="button" class="btn btn-primary btn-block" id="editUser" rel="'.$user['user_username'].'" onclick=editButton("'.$user['user_id'].'"); data-toggle="modal" data-target="#editModal">Edit</button>
                    </div>
                </td>
            </tr>
            ';
        }
	
	}
}
//echo $totalUserCount;
?>