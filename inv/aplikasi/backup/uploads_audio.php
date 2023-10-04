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
    "mpeg", 
    "m4a"
);

$allowedMimeTypes = array(
   "audio/mpeg", 
   "audio/m4a"
);

if (in_array(strtolower($extension), $allowedExts) AND in_array($mime, $allowedMimeTypes)) {
    // Generate new random name.
    $name = sha1(microtime()) . "." . $extension;

    // Save file in the uploads folder.
    move_uploaded_file($_FILES["file"]["tmp_name"], getcwd() . "../assets/all/audio/" . $name);

    // Generate response.
    $response = new StdClass;
    $response->link = "/client/ikita/webmin/aplikasi/assets/all/audio/" . $name;
    echo stripslashes(json_encode($response));
}
 
?>
