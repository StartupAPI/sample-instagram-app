<?php
######################################################
##
##  Configuration file for a sample app
##  Copy it to config.php and set values below
##
##  run make when you're done to init the data 
##
######################################################

/**
 * Source of randomness for security
 */
$randomness = '...some.random.characters.go.here...';

/**
 * Database connectivity
 */
$mysql_db = 'sample_instagram';
$mysql_user = 'sample_instagram';
$mysql_password = '...password...';
#$mysql_host = 'localhost';
#$mysql_port = 3306;
#$mysql_socket = '/tmp/mysql.sock'; // in case you are using socket to connect

/**
 * OAuth credentials
 */
$oauth2_key = '...oauth2.key.goes.here...';
$oauth2_secret = '...oauth.secret.goes.here...';

/**
 * SMTP host
 */
$amazonSMTPHost = 'email-smtp.us-east-1.amazonaws.com';

/**
 * SMTP UserName
 */
$amazonSMTPUserName = '';

/**
 * SMTP Password
 */
$amazonSMTPPassword = '';
