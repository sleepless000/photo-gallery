<?php
$db = require __DIR__ . '/includes/database.php';

if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
    if ($id === false || $id < 1) {
        echo json_encode(['error'=>'Invalid input!']);
        die();
    }
    $image = $db->find($id);
    if ($image === null) {
        echo json_encode(['message'=>'Not found!']);
        die();
    }
    if (json_last_error() === JSON_ERROR_NONE) {
        $image['path'] = ROOT_URL . 'images/'.$image['path'];
        header('Content-type: application/json');
        echo json_encode($image, JSON_UNESCAPED_SLASHES);
    } else {
        echo 'Something is wrong with JSON...';
        echo 'CODE: ' . json_last_error();
    }
} else {
    echo json_encode(['error'=>'You need to query image ID!']);
    die();
}
