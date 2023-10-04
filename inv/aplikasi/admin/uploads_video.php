<?php

$temp = explode(".", $_FILES["file"]["name"]);

// Get extension.
$extension = end($temp);

// An image check is being done in the editor but it is best to
// check that again on the server side.
// Do not use $_FILES["file"]["type"] as it can be easily forged.
$finfo = finfo_open(FILEINFO_MIME_TYPE);
$mime = finfo_file($finfo, $_FILES["file"]["tmp_name"]);

$allowedExts = array(
    "mp4", 
    "webm", 
    "ogg"
);

$allowedMimeTypes = array(
   "video/mp4", 
   "video/webm", 
    "video/ogg"
);

if (in_array(strtolower($extension), $allowedExts) AND in_array($mime, $allowedMimeTypes)) {
    // Generate new random name.
    $name = sha1(microtime()) . "." . $extension;

    // Save file in the uploads folder.
    move_uploaded_file($_FILES["file"]["tmp_name"], getcwd() . "/../assets/all/video/" . $name);

    // Generate response.
    $response = new StdClass;
    $response->link = "/client/ikita/webmin/aplikasi/assets/all/video/" . $name;
    echo stripslashes(json_encode($response));
}
 
?>
