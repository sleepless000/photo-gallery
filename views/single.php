<?php
include __DIR__ . '/../partials/header.php';

try {
    if (isset($_GET['id'])) {
        $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
    } else {
        throw new RuntimeException('<h2 class="text-center">ID missing.</h2>');
    }
    if ($id === false || $id < 1) {
        throw new RuntimeException('<h2 class="text-center">Invalid input!</h2>');
    }
    $image = $db->find($id);
    if ($image === null) {
        throw new RuntimeException('<h2 class="text-center">Not Found.</h2>');
    }
} catch (Exception $e) {
    echo($e->getMessage());
    include __DIR__ . '/../partials/footer.php';
    die();
}

$tpl = file_get_contents(__DIR__ . '/../partials/single.php');
$replacements = array(
    '[+link+]' => 'index.php?page=gallery',
    '[+path+]' => UPLOAD_DIR . htmlentities($image['path']),
    '[+title+]' => htmlentities($image['title']),
    '[+id+]' => htmlentities($image['id']),
    '[+description+]' => htmlentities($image['description'])
);

echo str_replace(array_keys($replacements), $replacements, $tpl);

include __DIR__ . '/../partials/footer.php';
