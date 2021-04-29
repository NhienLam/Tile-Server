<?php

namespace NhienLam\hw4\executables;
use NhienLam\hw4\models\monolog\Monolog as Monolog;
use NhienLam\hw4\vendor\Monolog\Logger;
use NhienLam\hw4\vendor\monolog\monolog\src\Monolog\Handler\StreamHandler;
use NhienLam\hw4\vendor\monolog\monolog\src\Monolog\Handler\FirePHPHandler;

$currentDir = getcwd();
$folder = $argv[2];
$image = $argv[1];
define("SOME_PLACE_IMAGE", $currentDir . "/" . $folder . "/" . "some_place.jpg");


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

// copy some_image to some_folder
function copyImageToFolder()
{
    global $image;
    global $currentDir;
    global $folder;
    $dir = $folder;

    // check if directory to store images exists
    if (!is_dir($dir)) {
        echo "Directory not found! Create the folder\n";
        if (mkdir($currentDir . "/" . $folder, 0777)) {
            echo "Folder has successfully been created\n";
        } else {
            echo "Failed to create folder\n";
        }
    }


    // // check if file is JPG or JPEG type
    $targetFile = $image;
    if (is_jpg($targetFile) == true) {
        echo "Correct file type! This is an jpg or jpeg file\n";
        // Store the path of destination file
        $newFileName = "some_place.jpg";
        $destination = $dir . "/" . $newFileName;
        if (!copy($image, $destination)) {
            echo "File can't be copied! \n";
        } else {
            echo "File has been copied! \n";
        }
    } else {
        echo "This image is NOT a jpg nor jpeg";
    }
}

function createImages()
{
    // Monolog to write a log message saying which images was just saved.
    // $monolog = new Monolog();

    global $currentDir;
    global $folder;
    /*** ************** ***/
    /*** create all.jpg ***/
    /*** ************** ***/
    // Load an image 
    $all = imagecreatefromjpeg(SOME_PLACE_IMAGE);

    // rescale image so as to be 800 x 800
    $all = imagescale($all, 800, 800);

    // Convert the image into JPEG using imagejpeg() function
    imagejpeg($all, $currentDir . "/" . $folder . "/" . "all.jpg");
    imagedestroy($all);
    echo "Successfully create all.jpg\n";
    // $monolog->savedImageLog();


    /*** **************** ***/
    /*** create blank.jpg ***/
    /*** **************** ***/
    $blank = imagecreate(200, 200);
    $background = imagecolorallocate($blank, 0, 0, 0);
    $foreground = imagecolorallocate($blank, 0, 0, 0);

    // Convert the image into JPEG using imagejpeg() function
    imagejpeg($blank, $currentDir . "/" . $folder . "/" . "blank.jpg");
    imagedestroy($blank);
    echo "Successfully create blank.jpg\n";
    // $monolog->savedImageLog();


    /*** **************** ***/
    /*** create 16 ij.jpg ***/
    /*** **************** ***/
    // check if all.jpg exist
    $allPath = $currentDir . "/" . $folder . "/" . "all.jpg";
    if (file_exists($allPath)) {
        for ($i = 0; $i <= 3; $i++) {
            for ($j = 0; $j <= 3; $j++) {
                // Load an image
                $temp = imagecreatefromjpeg($allPath);
                $crop = imagecrop($temp, ['x' => $i*200 , 'y' => $j*200, 'width' => 200, 'height' => 200]);
                if ($crop !== FALSE) {
                    // Convert the image into JPEG using imagejpeg() function
                    imagejpeg($crop, $currentDir . "/" . $folder . "/" . $i . $j .".jpg");
                    imagedestroy($crop);
                }
                imagedestroy($temp);
            }
        }
        echo "Successfully create 16 ij.jpg\n";
        // $monolog->savedImageLog();
    } else {
        echo "The all.jpg image does not exist";
    }

    /*** ******************* ***/
    /*** create 256 ijnm.jpg ***/
    /*** ******************* ***/
    // check if all.jpg exist
    if (file_exists($allPath)) {
        for ($i = 0; $i <= 3; $i++) {
            for ($j = 0; $j <= 3; $j++) {
                for ($n = 0; $n <= 3; $n++) {
                    for ($m = 0; $m <= 3; $m++) {
                        // Load an image
                        $output = imagecreatetruecolor(200, 200);
                        $temp = imagecreatefromjpeg($allPath);
                        imagecopyresized($output, $temp, 0, 0, ($i*200 + $n*50), ($j*200+ $m*50), 200, 200, 50, 50);
                        // Convert the image into JPEG using imagejpeg() function
                        imagejpeg($output, $currentDir . "/" . $folder . "/" . $i . $j . $n . $m.".jpg");
                        imagedestroy($output);
                        imagedestroy($temp);
                    }
                }
            }
        }
        echo "Successfully create 256 ijnm.jpg\n";
        // $monolog->savedImageLog();
    } else {
        echo "The all.jpg image does not exist";
    }
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
copyImageToFolder($image);
createImages();
