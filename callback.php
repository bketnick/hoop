<?php 

include 'config.php';

$client = new OAuth2\Client($clientId, $clientSecret);

if(!isset($_GET['code'])){
	$authUrl = $client->getAuthenticationUrl($authorizeUrl, $redirectUrl);
	header('Location: '.$authUrl);
	die('Redirect');
}else{
	$params = array('code' => $_GET['code'], 'redirect_uri' => $redirectUrl);
	$response = $client->getAccessToken($accessTokenUrl, 'authorization_code', $params);
	$token = $response['result']['access_token'];
	$client->setAccessTokenType(1);
	$client->setAccessToken($token);
	$_SESSION['client'] = $client;
	$_SESSION['token'] = $token;
	header('Location: index.php');
}
?>