<?php
// Allowed extentions.
$allowedExts = array("gif", "jpeg", "jpg", "png", "blob");

// Get filename.
$temp = explode(".", $_FILES["file"]["name"]);

// Get extension.
$extension = end($temp);

$finfo = finfo_open(FILEINFO_MIME_TYPE);
$mime = finfo_file($finfo, $_FILES["file"]["tmp_name"]);

if ((($mime == "image/gif")
|| ($mime == "image/jpeg")
|| ($mime == "image/pjpeg")
|| ($mime == "image/x-png")
|| ($mime == "image/png"))
&& in_array(strtolower($extension), $allowedExts)) {
    // Generate new random name.
    $name = sha1(microtime()) . "." . $extension;

    // Save file in the uploads folder.
    move_uploaded_file($_FILES["file"]["tmp_name"], getcwd() . "/../assets/all/image/".$name);

    // Generate response.
    $response = new StdClass;
    $response->link = "/client/ikita/webmin/aplikasi/assets/all/image/".$name;
    echo stripslashes(json_encode($response));
}
   ?>