<?php

trait Resizeable
{
    public static function isImageJPG($image): bool
    {
        $details = getimagesize($image);
        if ($details[2] === IMAGETYPE_JPEG) {
            return true;
        }
        throw new RuntimeException('Wrong file type. File must be a valid JPG image.');
    }

    public function resizeImage($original, $w, $h): bool
    {
        list($w_orig, $h_orig, $type) = getimagesize($original);

        if ($type !== false) {
            switch ($type) {
                case IMAGETYPE_JPEG: // JPG File
                    $src = imagecreatefromjpeg($original);
                    break;
//                    ** uncomment for PNG functionality **
//                case IMAGETYPE_PNG: // PNG File
//                    $src = imagecreatefrompng($original);
//                    break;
                default:
                    throw new RuntimeException('Wrong file type. File must be a valid image');
            }

            $scale_ratio = $w_orig / $h_orig;
            if ($w_orig <= $w && $h_orig <= $h) {
                return true;
            }
            if (($w / $h) > $scale_ratio) {
                $w = $h * $scale_ratio;
            } else {
                $h = $w / $scale_ratio;
            }

            $new = imagecreatetruecolor($w, $h);
            imagecopyresampled($new, $src, 0, 0, 0, 0, $w, $h, $w_orig, $h_orig);
            if (!imagejpeg($new, $original, 90)) {
                throw new RuntimeException('Can\'t save new file');
            }
            imagedestroy($src);
            imagedestroy($new);
            return true;
        }
        throw new RuntimeException('Bad image file');
    }
}
