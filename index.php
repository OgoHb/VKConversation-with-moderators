<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>Conversation</title>
	<meta charset="utf-8">
</head>
<body>
    <?php
	include 'config.php';

    $url = 'http://oauth.vk.com/authorize';
    $params = array(
        'client_id'     => $client_id,
        'redirect_uri'  => $redirect_uri,
        'response_type' => 'code'
    );

    echo $link = '<p><a href="' . $url . '?' . urldecode(http_build_query($params)) . '">Login via VK </a></p>';

if (isset($_GET['code'])) {
    $result = false;
    $params = array(
        'client_id'     => $client_id,
        'client_secret' => $client_secret,
        'code'  		=> $_GET['code'],
        'redirect_uri'  => $redirect_uri
    );

    $token = json_decode(file_get_contents('https://oauth.vk.com/access_token' . '?' . urldecode(http_build_query($params))), true);

    if (isset($token['access_token'])) {
        $params = array(
            'uids'         => $token['user_id'],
            'fields'       => 'uid,',
            'access_token' => $token['access_token']
        );

        $userInfo = json_decode(file_get_contents('https://api.vk.com/method/users.get' . '?' . urldecode(http_build_query($params))), true);
        if (isset($userInfo['response'][0]['uid'])) {
            $userInfo = $userInfo['response'][0];
            $result = true;
        }
    }

		if ($result && $userInfo['uid'] == in_array($userInfo['uid'], $moder_id)) {
				
		echo "<form action='remove.php' method='post'><p>id: <input type='text' name='kickid' />" ;
		if ($reason_message == true){
		echo "</p><p>reason: <input type='text' name='reason' /></p>" ;
		}
		echo "<p><input type='submit' /></p></form>";
		}else{
			echo "access denied";
		}
}
?>

</body>
</html>
