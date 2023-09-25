<?php
namespace App\Http\Traits;

use Illuminate\Support\Facades\Date;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

Trait ImageProccessingTrait
{
    // Mahmoud Kssab
    private $path = 'attachments';

    /**
     * img extenstions
     */
    public function getMime ($mime){
        if ($mime == 'image/jpg')
            $extension = '.jpg';
        elseif ($mime == 'image/jpeg')
            $extension = '.jpeg';
        elseif ($mime == 'image/png')
            $extension = '.png';
        elseif ($mime == 'image/gif')
            $extension = '.gif';
        elseif ($mime  == 'image/svg+xml' )
            $extension = '.svg';
        elseif ($mime == 'image/tiff')
            $extension = '.tiff';
        elseif ($mime == 'image/webp')
            $extension = '.webp';

        return $extension;
    }

    /**
     * Image Name
     */
    public function imageName($image)
    {
    }

    /**
     * AMA.Kssab Set single Pdf
     */
    public function setfile($file, $path, $width = null, $height = null)
    {
        $file->getClientOriginalExtension() == 'pdf' ?:
        Image::make($file)->resize($width, $height, function($constraint) {
                $constraint->aspectRatio();
            });
        $file->store($this->path . '/' . $path, 'public');
        return $file->hashName();
    }

    /**
     * AMA.Kssab Set array of pdf files
     */
    public function setfiles($files, $path, $column, $width = null, $height = null)
    {
        $filesName = [];
        foreach($files as $file){
            array_push($filesName, [$column => $this->setPdf($file, $path)]);
        }
        return $filesName;
    }

    /**
     * Mahmoud Kssab Set single Image
     */
    public function setImage($image, $path, $width = null, $height = null)
    {
        Image::make($image)->resize($width, $height, function($constraint) {
                $constraint->aspectRatio();
            });
        $image->store($this->path . '/' . $path, 'public');
        return $image->hashName();
    }

    /**
     * Mahmoud Kssab Set array of Images
     */
    public function setImages($images, $path, $column, $width = null, $height = null)
    {
        $imagesName = [];
        foreach($images as $image){
            array_push($imagesName, [ $column => $this->setImage($image, $path, $width, $height)]);
        }
        return $imagesName;
    }

    /**
     * open files
     */
    public function openFile($path)
    {
        $file = Storage::path('public/' . $this->path . '/' . $path);
        return response()->file($file);
    }

    /**
     * download files
     */
    public function downloadFile($path, $filesName)
    {
        $file = Storage::path('public/' . $this->path . '/' . $path);
        return response()->download($file, Date('Y-m-d H:i:s').$filesName);
    }

    /**
     * update image width and height
     */
    public function aspectForResize($image, $ownerId, $width, $height, $path)
    {
    }

    /**
     * crop image width and height
     */
    public function aspectForCrop($image, $ownerId, $width, $height, $path)
    {
    }

    /**
     * Thumbnail image width and height
     */
    public function ImageThumbnail($image, $ownerId, $path, $thumb = false)
    {
    }

    /**
     * Mahmoud Kssab Delete image
     */
    public function deleteImage($location, $filename)
    {
        return Storage::disk('public')->delete($this->path . '/' . $location . '/' . $filename);
    }

    /**
     * Mahmoud Kssab Delete images
     */
    public function deleteImages($images, $location)
    {
        foreach ($images as $image) {
            $this->deleteImage($location, $image);
        }
    }

    /**
     * AMA.Delete Files Folder
     */
    public function deleteFilesFolder($location)
    {
        return Storage::disk('public')->deleteDirectory($this->path . '/' . $location);
    }

}
