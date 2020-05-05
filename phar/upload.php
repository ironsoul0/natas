<?php

include 'logging.php';

$allowedExtensions = ['gif', 'jpg'];

$fName = $_FILES['imageUpload']['name'];
$fSize = $_FILES['imageUpload']['name'];
$fTmp = $_FILES['imageUpload']['tmp_name'];
$fType = $_FILES['imageUpload']['type'];
$fExt = strtolower(end(explode('.', $fName)));

$uploadPath = 'uploads/' . basename($fName);

if (isset($_POST['Submit'])) {
    if (!in_array($fExt, $allowedExtensions)) {
        echo "File extension not allowed";
        die();
    }
    if (!file_exists($uploadPath)) {
        move_uploaded_file($fTmp, $uploadPath);
        echo "Moved: " . $fTmp . "To: " . $uploadPath;
    } else {
        echo "Cannot overwrite file: " . $uploadPath;
        die();
    }
}

?>
