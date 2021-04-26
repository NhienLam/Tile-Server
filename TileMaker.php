<?php

namespace NhienLam\hw4\executables;

$currentDir = getcwd();
$folder = $argv[2];
$image = $argv[1];

// create folder in executables folder
function createFolder()
{
    global $currentDir;
    global $folder;
    // 0777 means "make this folder world writable"
    if (mkdir($currentDir . "/" . $folder, 0777)) {
        echo "Folder has successfully been created\n";
    } else {
        echo "Failed to create folder\n";
    }
}

// create image
function createImages()
{
    global $image;
    // location to store file
    // $targetDir = "src/resources/";
    // $targetName = "some_map_image.jpg";
    // $targetFile = $targetDir .$targetName;
    $targetFile = $image;

    // check if file is JPG type
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // $fileType = exif_imagetype($_FILES['fupload']['tmp_name']);

    // if (function_exists('exif_imagetype'))
    // {
    //     $fileType = exif_imagetype($_FILES['fupload']['tmp_name']);
    // }
    // else
    // {
    //     echo "You do not have the EXIF extension\n";
    // }

    // $typeOfFile = exif_imagetype($_FILES["img"]["tmp_name"]);
    // if (!(($typeOfFile == "1") || ($typeOfFile == "2") || ($typeOfFile == "3"))) {
    //     echo "This image is not a jpg nor jpeg";
    // } else {
    //     if ($typeOfFile == "1") {
    //         $img = imagecreatefromgif($_FILES["img"]["tmp_name"]);
    //     }
    //     if ($typeOfFile == "2") {
    //         $img = imagecreatefromjpeg($_FILES["img"]["tmp_name"]);
    //     }
    //     if ($typeOfFile == "3") {
    //         $img = imagecreatefrompng($_FILES["img"]["tmp_name"]);
    //     }
    //     /// rescale image so as to be 800 x 800
    //     $image = imagescale($image, 800, 800);
    // }

    if(is_jpg($targetFile)==true)
    {
        echo "This is an jpg or jpeg\n";
        $img = imagecreatefromjpeg($_FILES["img"]["tmp_name"]);
        // rescale image so as to be 800 x 800
        $img = imagescale($img, 800, 800);
    } else {
        echo "This image is NOT a jpg nor jpeg";
    }

    // if file type is JPG, create image
    // if ($fileType == IMAGETYPE_JPEG) {
    //     $image = imagecreatefromjpeg($_FILES["fupload"]["tmp_name"]);
    //     // rescale image so as to be 800 x 800
    //     $image = imagescale($image, 800, 800);
    // } else {
    //     echo "This image is not a jpg nor jpeg";
    // }
}

// check if it is jpg or jpeg file type
function is_jpg($path)
{
    $a = getimagesize($path);
    $image_type = $a[2];
    if (in_array($image_type, array(IMAGETYPE_JPEG))) {
        return true;
    }
    return false;
}

createFolder($folder);
createImages($image);
