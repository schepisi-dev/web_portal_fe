<?php
session_start();
/*$userName = $_GET['username'];
$password = $_GET['password'];
$jsondata = '{"Results":[{"username":"clark@gmail.com","password":"123456","user_auth":"1"},
             {"username":"mark@gmail.com","password":"654321","user_auth":"2"},
             {"username":"aubrey@gmail.com","password":"123654","user_auth":"3"}]}';
$jsonArray = json_decode($jsondata, true);

foreach($jsonArray["Results"] as $user) {
    if($user['username']==$userName && $user['password']==$password ) {
    	echo '{"response":{"error": "1"}}';
    	$userType = $user['user_auth'];
        echo "User Type = ";
        if($userType == '1'){
        	echo 'Super Admin';
        }
        else if($userType == '2'){
        	echo 'Admin';
        }
        else if($userType == '3'){
        	echo 'Organization Admin';
        }
        else{
        	echo 'Unknown';
        }
		break;  
    }
    else if($user['username'] == false && $user['password'] == false){
    	echo '{"response":{"error": "0"}}';
    }

}*/
$username = $_GET['username'];
$password = $_GET['password'];

if($username == "clark@yahoo.com" && $password == "123456"){
echo '{"response":{"error": "1"}}';
$_SESSION['userName'] = $username;
$_SESSION['auth'] = '1';
}
else if($username == "mark@yahoo.com" && $password == '654321'){
echo '{"response":{"error": "1"}}';
$_SESSION['userName'] = $username;
$_SESSION['auth'] = '2';

}
else if($username == "aubrey@yahoo.com" && $password == '123654'){
echo '{"response":{"error": "1"}}';
$_SESSION['userName'] = $username;
$_SESSION['auth'] = '3';

}


else{
  echo '{"response":{"error": "0"}}';
}
?>