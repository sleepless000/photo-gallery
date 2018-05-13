<?php

if (isset($_POST['submit'], $_POST['title'], $_FILES['uploaded_file']['tmp_name'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $imageName = $_FILES['uploaded_file']['name'];
    $imageTemp = $_FILES['uploaded_file']['tmp_name'];
    $file = $_FILES['uploaded_file'];

    try {
        if (empty($imageName) || empty(trim($title))) {
            throw new RuntimeException('Please select image file AND enter image title');
        }
        Upload::isImageJPG($imageTemp);
        $upload = new Upload($file, UPLOAD_DIR);
        $upload->resizeImage($upload->filePath, 600, 600);
        $upload->copyTo(UPLOAD_DIR_THUMB);
        $upload->resizeImage($upload->fileCopyPath, 150, 150);
        $db->insert($upload->fileName, $title, $description);
        $message = '<p class="alert alert-success">Image saved successfully</p>';
        header( 'refresh:0.7;url=index.php?page=gallery' );

    } catch (Exception $e) {
        $message = '<p class="alert alert-danger">Error: ' . $e->getMessage() . '</p>';
    }
}