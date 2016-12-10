<?php
/**
 * Created by PhpStorm.
 * User: n0m4dz
 * Date: 1/31/16
 * Time: 6:01 AM
 */

namespace Go\Utils;

class ImageHelper
{
    public function showThumb($photo){
        $thumb = null;
        if($photo != null || $photo != ""){
            $photo = json_decode($photo);
            $thumb = $photo->thumbUrl . $photo->uniqueName;
        }
        return $thumb;
    }

    public function showPhoto($photo){
        $mainImage = null;
        if($photo != null || $photo != ""){
            $photo = json_decode($photo);
            $mainImage = $photo->destinationUrl . $photo->uniqueName;
        }
        return $mainImage;
    }
}