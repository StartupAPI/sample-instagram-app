<?php
require_once(__DIR__ . '/config.php');

/**
 * You must fill it in with some random string
 * this protects some of your user's data when sent over the network
 * and must be different from other sites
 */
UserConfig::$SESSION_SECRET = $randomness;

/**
 * Database connectivity
 */
UserConfig::$mysql_db = $mysql_db;
UserConfig::$mysql_user = $mysql_user;
UserConfig::$mysql_password = $mysql_password;
UserConfig::$mysql_host = isset($mysql_host) ? $mysql_host : 'localhost';
UserConfig::$mysql_port = isset($mysql_port) ? $mysql_port : 3306;
UserConfig::$mysql_socket = isset($mysql_port) ? $mysql_socket : null;

/**
 * User IDs of admins for this instance (to be able to access dashboard at /users/admin/)
 */
UserConfig::$admins[] = 1;

/*
 * Uncomment next line to enable debug messages in error_log
 */
#UserConfig::$DEBUG = true;

/*
 * Name of your application to be used in UI and emails to users
 */
UserConfig::$appName = 'Sample Instagram App';

UserConfig::loadModule('instagram');
new InstagramAuthenticationModule($oauth2_key, $oauth2_secret);

/**
 * Email configuration
 */
UserConfig::$supportEmailFromName = 'Sample App Support';
UserConfig::$supportEmailFromEmail = 'support@startupapi.com';
UserConfig::$supportEmailReplyTo = 'support@startupapi.com';

if ($amazonSMTPHost && $amazonSMTPUserName && $amazonSMTPPassword) {
  UserConfig::$mailer = Swift_Mailer::newInstance(
    Swift_SmtpTransport::newInstance($amazonSMTPHost, 587, 'tls')
      ->setUsername($amazonSMTPUserName)
      ->setPassword($amazonSMTPPassword)
  );
}

/**
 * Username and password registration configuration
 * just have these lines or comment them out if you don't want regular form registration
 */
#UserConfig::loadModule('usernamepass');
#new UsernamePasswordAuthenticationModule();
