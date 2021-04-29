Name: Nhien Lam
SJSU ID: 0145 06 167

Notes:
- If you're gonna delete any folders or files before running TileMake.php, you can delete all the files in
the resources folder, but please don't delete the resources folder itself. Similarly, you can delete other files
in execuatables folder, but please don't delete the execuatables folder itself and the Tilemaker.php.

- When run TileMaker.php on command line, please enter the PATH of the image and NAME of the folder.
For example, php TileMaker.php C:\Users\ricky\Pictures\san_jose.jpg photo

- If you get "PHP Fatal error" on anyline that uses PHP's Image Manipulation Functions
such as imagecreatefromjpeg() or imagecrop(), you need to enable the following extensions in php.ini:
   -extension=php_mbstring.dll
   -extension=php_exif.dll
   -extension=php_gd2.dll

- Before you run index.php, please go to View.php and change the name of the constant FOLDERNAME to the
 name of your newly created folder in executables folder (may be on line 8 of View.php)
    This line "define("FOLDERNAME", "photo");"
    Please put the name of new folder at ____ to: "define("FOLDERNAME", "____");"

- I also had a screenshots_of_output folder in src which contains several screenshots of the output; in 
case there is any technical issues that prevent my code to run properly.


I appologize for having lots of instructions.
I believe I have met all of the requirements except for item <h>. I got trouble using monolog.
I have tried my best to do this homework by myself but I don't have enough time to make the style looks nice.
Hope I did better than last time.
Thank you for grading!