<?php
$fb = new Facebook\Facebook([
  'app_id' => '237412096715854', // Replace {app-id} with your app id
  'app_secret' => '390b6a9dd1e737868a50de4a3fad7805',
  'default_graph_version' => 'v2.8',
  ]);

$helper = $fb->getRedirectLoginHelper();
$permissions = ['email', 'user_likes']; // optional
$loginUrl = $helper->getLoginUrl('http://{your-website}/login-callback.php', $permissions);

echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';
?>