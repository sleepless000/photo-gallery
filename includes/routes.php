<?php

if (!isset($_GET['page'])) {
    $id = 'home';
} else {
    $id = $_GET['page'];
}

switch ($id) {
    case 'home':
        include __DIR__.'/../views/upload.php';
        break;
    case 'single':
        include __DIR__.'/../views/single.php';
        break;
    case 'gallery':
        include __DIR__.'/../views/gallery.php';
        break;
    default:
        include __DIR__.'/../views/404.php';
}
