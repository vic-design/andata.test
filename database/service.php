<?php
$capsule = new Illuminate\Database\Capsule\Manager();

$capsule->addConnection([
    'driver' => 'mysql',
    'host' => DB_HOST,
    'database' => DB_NAME,
    'username' => DB_USER,
    'password' => DB_PASS
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();

foreach (glob(APP_ROOT . MIGRATIONS_DIR . "*.php") as $filename) {
    require_once $filename;
}
