<?php

//set up autoload for classes
spl_autoload_register(function ($class) {
    include __DIR__ . '/../classes/' . $class . '.php';
});

//set up constants for directories and table names
defined('UPLOAD_DIR') or define('UPLOAD_DIR', 'images/');
defined('UPLOAD_DIR_THUMB') or define('UPLOAD_DIR_THUMB', 'images/thumb/');
defined('TABLE_NAME_IMAGES') or define('TABLE_NAME_IMAGES', 'images');
defined('ROOT_URL') or define('ROOT_URL', (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/');

//set up database config
return [
    'database' => [
        'db_host' => '127.0.0.1',
        'db_user' => 'root',
        'db_pass' => '',
        'db_name' => 'w1_fma'
    ]
];
