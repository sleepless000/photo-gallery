<?php

//database factory
$config = require __DIR__ . '/config.php';

return new QueryBuilder(
    Connection::make($config['database']),
    TABLE_NAME_IMAGES
);
