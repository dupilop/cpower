<?php
function compress($source, $destination, $quality)
{

    $info = getimagesize($source);

    if ($info['mime'] == 'image/jpeg')
        $image = imagecreatefromjpeg($source);

    elseif ($info['mime'] == 'image/gif')
        $image = imagecreatefromgif($source);

    elseif ($info['mime'] == 'image/png')
        $image = imagecreatefrompng($source);

    imagejpeg($image, $destination, $quality);

    return $destination;
}
function fit_image_file_to_width($file, $w, $mime = 'image/jpeg')
{
    list($width, $height) = getimagesize($file);
    $newwidth = $w;
    $newheight = $w * $height / $width;

    switch ($mime) {
        case 'image/jpeg':
            $src = imagecreatefromjpeg($file);
            break;
        case 'image/png';
            $src = imagecreatefrompng($file);
            break;
        case 'image/bmp';
            $src = imagecreatefromwbmp($file);
            break;
        case 'image/gif';
            $src = imagecreatefromgif($file);
            break;
    }

    $dst = imagecreatetruecolor($newwidth, $newheight);
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

    switch ($mime) {
        case 'image/jpeg':
            imagejpeg($dst, $file);
            break;
        case 'image/png';
            imagealphablending($dst, false);
            imagesavealpha($dst, true);
            imagepng($dst, $file);
            break;
        case 'image/bmp';
            imagewbmp($dst, $file);
            break;
        case 'image/gif';
            imagegif($dst, $file);
            break;
    }

    imagedestroy($dst);
}
function newidea($folder, $filename, $newwidth, $newheight)
{
    $uploadimage = $folder . $filename;
    $newname = $filename;

    // Set the resize_image name
    $resize_image = $folder . $newname;
    $actual_image = $folder . $newname;


    // It gets the size of the image
    list($width, $height) = getimagesize($uploadimage);



    // It loads the images we use jpeg function you can use any function like imagecreatefromjpeg
    $thumb = imagecreatetruecolor($newwidth, $newheight);
    // imagealphablending($thumb, FALSE);
    // imagesavealpha($thumb, TRUE);
    $source = imagecreatefromjpeg($filename);


    // Resize the $thumb image.
    imagecopyresampled($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);


    // It then save the new image to the location specified by $resize_image variable

    imagejpeg($thumb, $resize_image, 100);
    // $out_image = addslashes(file_get_contents($resize_image));
}
