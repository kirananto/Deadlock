<?php
echo 'Welcome!';
echo '<h2>Facebook API </h2>';
require_once __DIR__ . '/api/src/Facebook/autoload.php';
  $fb = new Facebook\Facebook([
  'app_id' => '237412096715854', // Replace {app-id} with your app id
  'app_secret' => '390b6a9dd1e737868a50de4a3fad7805',
  'default_graph_version' => 'v2.8',
  ]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl('http://localhost/fb-callback.php:8080', $permissions);

echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';
?>