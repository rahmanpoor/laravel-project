<?php


namespace App\Http\Services\Image;


use Intervention\Image\ImageManager;

class ImageService extends ImageToolsService
{

    public function save($image)
    {
        //set image
        $this->setImage($image);
        //execute provider
        $this->provider();
        //save image
        $manager = new ImageManager(new \Intervention\Image\Drivers\Gd\Driver());
        $imageObject = $manager->read($image->getRealPath());
        $savePath = public_path($this->getImageAddress());
        $result = $imageObject->save($savePath, quality: null, format: $this->getImageFormat());
        return $result ? $this->getImageAddress() : false;
    }



    public function fitAndSave($image, $width, $height)
    {
        //set image
        $this->setImage($image);
        //execute provider
        $this->provider();
        //save image
        $manager = new ImageManager(new \Intervention\Image\Drivers\Gd\Driver());
        $imageObject = $manager->read($image->getRealPath());
        $imageObject = $imageObject->cover($width, $height);
        $savePath = public_path($this->getImageAddress());
        $result = $imageObject->save($savePath, quality: null, format: $this->getImageFormat());
        return $result ? $this->getImageAddress() : false;
    }




}
