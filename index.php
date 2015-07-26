<?php
require_once(__DIR__.'/users/users.php');

// get user if logged in or require user to login
$user = User::require_login();

$creds = $user->getUserCredentials('instagram');
$result = $creds->makeOAuth2Request(
	'https://api.instagram.com/v1/users/self/media/recent/',
	'GET'
);
?><html>
<head>
	<title>Instagram Sample Application</title>
	<?php StartupAPI::head(); ?>
</head>
<body>
<div style="float: right"><?php StartupAPI::power_strip(); ?></div>

<h1>Welcome, <?php echo $user->getName() ?>!</h1>

<?php
	$feed = json_decode(utf8_encode($result), true);
	if ($feed['meta']['code'] == 200) {
		foreach ($feed['data'] as $image) {
			?>
			<img src="<?php echo $image['images']['thumbnail']['url']?>">
			<?php
		}
	}
?>

</body>
</html>
