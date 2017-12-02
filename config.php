<?php
	session_start();
	require_once "Facebook/autoload.php";

	$FB= new \Facebook\Facebook([
		'app_id' => '228271674378120',
		'app_secret' => '9cca833206e0070941c12a5c8edb58c6',
		'default_graph_version' => 'v2.11'
		]);

	$helper =$FB->getRedirectLoginHelper();
?>
