<?php
// '/app/stop.png'

require_once 'random-string.php';

function imageResize($image, $w, $h)
{
    $oldw = imagesx($image);
    $oldh = imagesy($image);
    $temp = imagecreatetruecolor($w, $h);
    imagecopyresampled($temp, $image, 0, 0, 0, 0, $w, $h, $oldw, $oldh);
    return $temp;
}

function applyData($name, $surname, $languages, $pathToImage, $uploadedPhoto)
{
    $font = '/../fonts/UbuntuCondensed-Regular.ttf';

    $blankImage = imagecreatetruecolor(500, 250);

    $backgroundColor = imagecolorallocate($blankImage, 240, 240, 240);

    imagefill(
        $blankImage,
        1,
        1,
        $backgroundColor
    );

    $textColor = imagecolorallocate($blankImage, 10, 10, 10);

    $testImage = imagecreatefrompng($uploadedPhoto);

    $testImage = imageResize($testImage, 100, 100);

    imagecopy(
        $blankImage,
        $testImage,

        25,
        25,

        0,
        0,

        100,
        100
    );

    imagefttext(
        $blankImage,
        25,
        0,
        150,
        60,
        $textColor,
        $font,
        $name
    );

    imagefttext(
        $blankImage,
        25,
        0,
        150,
        100,
        $textColor,
        $font,
        $surname
    );

    for ($i = 0; $i < count($languages); $i++) {
        $languageImage = '../logos/' . $languages[$i] . '.png';

        $height = 100;
        $width = 300;

        list($width_orig, $height_orig) = getimagesize($languageImage);

        $ratio_orig = $width_orig / $height_orig;

        if ($width / $height > $ratio_orig) {
            $width = ceil($height * $ratio_orig);
        } else {
            $height = ceil($width / $ratio_orig);
        }

        $image_p = imagecreatetruecolor($width, $height);
        $image = imagecreatefrompng($languageImage);
        imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);

        imagecopy(
            $blankImage,
            $image_p,

            25 + $i * 110,
            130,

            0,
            0,

            100,
            100
        );
    }

    imagedestroy($testImage);
    return imagepng($blankImage, $pathToImage);
}
