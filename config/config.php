<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

//site
define('SITE_NAME', 'Andata test');

//app root
define('APP_ROOT', dirname(__FILE__, 2));
define('URL_ROOT', '/');
define('URL_SUB_FOLDER', '');
define('MIGRATIONS_DIR', '/database/migrations/');

//db
define('DB_HOST', '127.0.0.1');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'andata');
