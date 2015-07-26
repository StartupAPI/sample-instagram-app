<?php
require_once(__DIR__.'/users/users.php');

// get user if logged in or require user to login
$user = User::require_login();
?><html>
<head>
	<title>Github Sample Application</title>
	<?php StartupAPI::head(); ?>
</head>
<body>
<div style="float: right"><?php StartupAPI::power_strip(); ?></div>

<h1>Welcome, <?php echo $user->getName() ?>!</h1>

</body>
</html>
