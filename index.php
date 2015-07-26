<?php
require_once(__DIR__.'/users/users.php');

// get user if logged in or require user to login
$user = User::require_login();

$creds = $user->getUserCredentials('instagram');
$result = $creds->makeOAuth2Request(
	'https://api.instagram.com/v1/users/self/media/recent/',
	'GET'
);

// start with global template data needed for Startup API menus and stuff
$template_info = StartupAPI::getTemplateInfo();

$template_info['name'] = $user->getName();

$feed = json_decode(utf8_encode($result), true);
if ($feed['meta']['code'] == 200) {
	foreach ($feed['data'] as $image) {
		$template_info['images'][] = array(
			'url' => $image['images']['thumbnail']['url'],
			'caption' => $image['caption']['text']
		);
	}
}

StartupAPI::$template->getLoader()->addPath(__DIR__ . '/templates', 'app');
StartupAPI::$template->display('@app/index.html.twig', $template_info);
