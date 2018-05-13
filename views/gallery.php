<?php
include __DIR__ . '/../partials/header.php';

try {
    $images = $db->selectAll();
    if (is_array($images)) {
        foreach ($images as $image) {
            $tpl = file_get_contents(__DIR__ . '/../partials/gallery.php');
            $replacements = array(
                '[+link+]' => 'index.php?page=single&id=',
                '[+path+]' => UPLOAD_DIR_THUMB . htmlentities($image['path']),
                '[+title+]' => htmlentities($image['title']),
                '[+id+]' => htmlentities($image['id']),
                '[+description+]' => htmlentities($image['description'])
            );
            echo str_replace(array_keys($replacements), $replacements, $tpl);
        }
    }
    throw new RuntimeException('Oops, problem with data! Try again later.');
} catch (Exception $e) {
    $message = '<p class="alert alert-danger">Error: ' . $e->getMessage() . '</p>';
}

include __DIR__ . '/../partials/footer.php';
