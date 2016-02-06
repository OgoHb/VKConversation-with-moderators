<?php
	include 'config.php';

	$kickid = htmlspecialchars($_POST['kickid']);
	$reason = htmlspecialchars($_POST['reason']);
	
	$reason = "{$bot_prefix}%20{$reason}";
	$reason = str_replace(" ", "%20", $reason);
	
	if($reason_message == true){
	file_get_contents("https://api.vk.com/method/messages.send?access_token={$access_token}&chat_id={$chat_id}&message={$reason}", true);
	}
	file_get_contents("https://api.vk.com/method/messages.removeChatUser?access_token={$access_token}&chat_id={$chat_id}&user_id={$kickid}", true);
	
	header("Location: https://vk.com/im");
?>
