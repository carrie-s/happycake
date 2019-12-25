<?php

define('DB_SERVER', "sql113.byethost.com");
define('DB_USER', "b8_24636178");
define('DB_PASSWORD', "s0263023");
define('DB_DATABASE', "b8_24636178_cake_house");
define('DB_DRIVER', "mysql");

$db = new PDO(DB_DRIVER . ":dbname=" . DB_DATABASE . ";host=" . DB_SERVER, DB_USER, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

date_default_timezone_set("Asia/Taipei");

 ?>
