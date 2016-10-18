<?php
	session_start();
	require_once("dbconnect.php");

	$client_id = '171361689981981'; // Client ID
	$client_secret = '122f0be72ddf50c4356bdfe6f49bdbe6'; // Client secret
	$redirect_uri = 'http://osora.ru/stazher/maria/index.php'; // Redirect URIs
	 
	$url = 'https://www.facebook.com/dialog/oauth';
	 
	$params = array(
	    'client_id'     => $client_id,
	    'redirect_uri'  => $redirect_uri,
	    'response_type' => 'code',
	    'scope'         => 'email,user_birthday'
	);
	 
	echo $link = '<p><a href="' . $url . '?' . urldecode(http_build_query($params)) . '">Аутентификация через Facebook</a></p>';
	 
	if (isset($_GET['code'])) {
	    $result = false;
	 
	    $params = array(
	        'client_id'     => $client_id,
	        'redirect_uri'  => $redirect_uri,
	        'client_secret' => $client_secret,
	        'code'          => $_GET['code']
	    );
	 
	    $url = 'https://graph.facebook.com/oauth/access_token';
	 
	    $tokenInfo = null;
	    parse_str(file_get_contents($url . '?' . http_build_query($params)), $tokenInfo);
	 
	    if (count($tokenInfo) > 0 && isset($tokenInfo['access_token'])) {
	        $params = array('access_token' => $tokenInfo['access_token']);
	 
	        $userInfo = json_decode(file_get_contents('https://graph.facebook.com/me' . '?' . urldecode(http_build_query($params))), true);
	 
	        if (isset($userInfo['id'])) {
	            $userInfo = $userInfo;
	            $result = true;
	        }
	    }
		if ($result) {
			$name = $userInfo['name'];
			$face_id = $userInfo['id'];
			$query = " SELECT * FROM users WHERE username = '$face_id'";
			$res = mysql_query($query) or die ( "Error : ".mysql_error() );
			if(mysql_num_rows($res) !== 1){
				$query = " INSERT INTO users (name,username,face_id) VALUES ('$name', '$face_id', '$face_id')";
				$res = mysql_query($query) or die ( "Error : ".mysql_error() );
				$_SESSION['username'] = $name;
				header('Location: test.php');
			}
			else{
				$_SESSION['username'] = $name;
				header('Location: test.php');
			}
    	}
	}
	
	
	
?>
