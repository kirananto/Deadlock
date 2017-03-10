<?php
session_start();

//Include Facebook SDK
require_once 'inc/facebook.php';

/*
 * Configuration and setup FB API
 */
$appId = '237412096715854'; //Facebook App ID
$appSecret = '390b6a9dd1e737868a50de4a3fad7805'; // Facebook App Secret
$redirectURL = 'http://deadlock.a3k.in/';// Callback URL
$fbPermissions = 'email';  //Required facebook permissions

//Call Facebook API
$facebook = new Facebook(array(
  'appId'  => $appId,
  'secret' => $appSecret
));
$fbUser = $facebook->getUser();
?>
