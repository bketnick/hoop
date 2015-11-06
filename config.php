<?php 

require('OAuth2/client.php');
require('OAuth2/GrantType/IGrantType.php');
require('OAuth2/GrantType/AuthorizationCode.php');

$baseApiUrl = 'https://foobar.nationbuilder.com';
$clientId = 'yourclientid';
$clientSecret = 'yourclientsecret';

$redirectUrl    = '/where/this/lives/callback.php';
$authorizeUrl   = $baseApiUrl.'/oauth/authorize';
$accessTokenUrl = $baseApiUrl.'/oauth/token';

$baseSiteSlug = 'yourwebsiteslug';

session_start();
 ?>