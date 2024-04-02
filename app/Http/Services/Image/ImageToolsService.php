<?php
namespace App\Http\Services\Image;
 class ImageToolsService
 {
protected $image;
protected $exclusiveDirectory;
protected $imageDirectory;
protected $imageName;
protected $imageFormat;
protected $finalImageDirectory;
protected $finalImageName;
public function setImage($image){
    $this->image = $image;
}
public function getExclusiveDirectory(){
    return $this->exclusiveDirectory;
}
public function setExclusiveDirectory($exclusiveDirectory){
     $this->exclusiveDirectory = trim($exclusiveDirectory, '/\\');
}
public function getImageDirectory(){
    return $this->imageDirectory;
}
public function setImageDirectory($imageDirectory){
     $this->imageDirectory = trim($imageDirectory, '/\\');
}

public function getImageName(){
    return $this->imageName;
}
public function setImageName($imageName){
     $this->imageName = trim($imageName, '/\\');
}
public function setCurrentImageName(){
return !empty($this->image) ? $this->setImageName(pathinfo($this->image->getClientOriginalName(), PATHINFO_FILENAME)) : false;
}
public function getimageFormat(){
    return $this->imageFormat;
}
public function setimageFormat($imageFormat){
     $this->imageFormat = $imageFormat;
}
public function getFinalImageDirectory(){
    return $this->finalImageDirectory;
}
public function setFinalImageDirectory($finalImageDirectory){
    $this->finalImageDirectory = $finalImageDirectory;
}
public function getFinalImageName(){
    return $this->finalImageName;
}
public function setFinalImageName($finalImageName){
    $this->finalImageName = $finalImageName;
}
protected function checkDirectory($finalImageDirectory){
    if(!file_exists($finalImageDirectory)){
        mkdir($finalImageDirectory, 775, true);
    }
}
public function getImageAddress(){
return $this->finalImageDirectory . DIRECTORY_SEPARATOR . $this->finalImageName;
}
protected function provider(){
    //set properties
    $this->getImageDirectory() ?? $this->setImageDirectory(date('y') . DIRECTORY_SEPARATOR . date('m') . DIRECTORY_SEPARATOR . date('d'));
    $this->getImageName() ?? $this->setImageName(time());
    $this->getimageFormat() ?? $this->setimageFormat($this->image->extension());


    //set a final image directory
$finalDirectory = empty($this->getExclusiveDirectory()) ? $this->getImageDirectory() : $this->getExclusiveDirectory() . DIRECTORY_SEPARATOR . $this->getImageDirectory();
$this->setFinalImageDirectory($finalDirectory);

//set a final image name

$this->setFinalImageName($this->getImageName() . '.' . $this->getimageFormat());


// check an final image directory
$this->checkDirectory($this->getFinalImageDirectory());
}

}
